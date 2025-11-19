CREATE TRIGGER trg_article_entry_insert 
AFTER INSERT ON entry 
FOR EACH ROW 
BEGIN
    /* Solo ejecutamos el UPDATE si la bandera NO está encendida */
    IF (@IS_AUTO_ENTRY IS NULL OR @IS_AUTO_ENTRY = 0) THEN
        
        /* Y mantenemos tu filtro extra por seguridad */
        IF NEW.observations != 'Inventario Inicial Automático' OR NEW.observations IS NULL THEN
            UPDATE article 
            SET quantity = quantity + NEW.quantity 
            WHERE id = NEW.article_id;
        END IF;

    END IF;
END