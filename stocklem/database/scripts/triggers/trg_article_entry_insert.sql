CREATE TRIGGER trg_article_entry_insert 
AFTER INSERT ON entry 
FOR EACH ROW 
BEGIN
    /* Si es una entrada automática, NO hacemos update para evitar bucle infinito */
    IF (@IS_AUTO_ENTRY IS NULL OR @IS_AUTO_ENTRY = 0) THEN
        
        /* Doble check por seguridad en el texto */
        IF NEW.observations != 'Inventario Inicial Automático' OR NEW.observations IS NULL THEN
            UPDATE article 
            SET quantity = quantity + NEW.quantity 
            WHERE id = NEW.article_id;
        END IF;

    END IF;
END