CREATE TRIGGER trg_create_initial_entry
AFTER INSERT ON article
FOR EACH ROW
BEGIN
    /* 1. Si estamos corriendo Seeders (@DISABLE_TRIGGERS), no hacemos nada */
    IF (@DISABLE_TRIGGERS IS NULL OR @DISABLE_TRIGGERS = 0) THEN
        
        IF NEW.quantity > 0 THEN
            /* 2. Encendemos bandera para que el trigger de entrada no se vuelva loco */
            SET @IS_AUTO_ENTRY = 1;

            INSERT INTO entry (
                sena_code, date_entry, quantity, observations, article_id, created_at, updated_at
            )
            VALUES (
                CONCAT('INI-', NEW.id), CURDATE(), NEW.quantity, 'Inventario Inicial Automático', NEW.id, NOW(), NOW()
            );

            /* 3. Apagamos bandera */
            SET @IS_AUTO_ENTRY = NULL;
        END IF;

    END IF;
END