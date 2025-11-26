CREATE TRIGGER trg_article_issue_update 
AFTER UPDATE ON issue 
FOR EACH ROW 
BEGIN
    DECLARE rows_affected INT;

    /* ATOMIC UPDATE:
       La lógica es: Stock Actual + Lo que devuelvo (OLD) tiene que ser >= Lo que me llevo ahora (NEW)
    */
    UPDATE article
    SET quantity = quantity + OLD.quantity - NEW.quantity
    WHERE id = NEW.article_id
      AND (quantity + OLD.quantity) >= NEW.quantity;

    SELECT ROW_COUNT() INTO rows_affected;

    IF rows_affected = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'ERROR DE STOCK: Al editar esta salida, el stock quedaría en negativo.';
    END IF;
END