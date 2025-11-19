CREATE TRIGGER trg_create_initial_entry
AFTER INSERT ON article
FOR EACH ROW
BEGIN
    /* 1. Verificamos que no estemos en modo Seeders (@DISABLE_TRIGGERS) */
    IF (@DISABLE_TRIGGERS IS NULL OR @DISABLE_TRIGGERS = 0) THEN
        
        IF NEW.quantity > 0 THEN
            /* 2. ENCENDEMOS LA BANDERA para avisar al otro trigger */
            SET @IS_AUTO_ENTRY = 1;

            INSERT INTO entry (
                sena_code, date_entry, quantity, observations, article_id, created_at, updated_at
            )
            VALUES (
                CONCAT('COD-SENA', NEW.id),
                CURDATE(),
                NEW.quantity, 
                'Descripción automática',
                NEW.id,
                NOW(),
                NOW()
            );

            /* 3. APAGAMOS LA BANDERA (Limpieza) */
            SET @IS_AUTO_ENTRY = NULL;
        END IF;

    END IF;
END