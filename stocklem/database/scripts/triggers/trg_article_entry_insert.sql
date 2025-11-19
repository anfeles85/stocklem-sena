CREATE TRIGGER trg_article_entry_insert 
AFTER INSERT ON entry 
FOR EACH ROW 
BEGIN
    /* Validamos: Si la observación es "Inventario Inicial Automático", 
       NO sumamos nada, porque el artículo ya nació con esa cantidad.
       Para cualquier otra entrada normal, SI sumamos.
    */
    IF NEW.observations != 'Inventario Inicial Automático' OR NEW.observations IS NULL THEN
        UPDATE article 
        SET quantity = quantity + NEW.quantity 
        WHERE id = NEW.article_id;
    END IF;
END