CREATE TRIGGER trg_article_issue_insert 
AFTER INSERT ON issue 
FOR EACH ROW 
BEGIN
    DECLARE rows_affected INT;

    /* ATOMIC UPDATE: 
       Intentamos actualizar SOLO si el stock actual (quantity) es suficiente.
       La condición es: quantity >= NEW.quantity
    */
    UPDATE article
    SET quantity = quantity - NEW.quantity
    WHERE id = NEW.article_id 
      AND quantity >= NEW.quantity;

    /* Verificamos si la actualización sucedió */
    SELECT ROW_COUNT() INTO rows_affected;

    /* Si rows_affected es 0, significa que no cumplió la condición (No había saldo) */
    IF rows_affected = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'ERROR DE STOCK: No hay suficientes unidades disponibles para realizar esta salida.';
    END IF;
END