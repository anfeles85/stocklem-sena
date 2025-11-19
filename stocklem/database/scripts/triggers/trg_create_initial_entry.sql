CREATE TRIGGER trg_create_initial_entry
AFTER INSERT ON article
FOR EACH ROW
BEGIN
    /* VERIFICACIÓN DE SEGURIDAD:
       Si la variable @DISABLE_TRIGGERS está activa (1), el trigger NO hace nada.
       Esto permite correr Seeders o Importaciones sin duplicar entradas.
    */
    IF (@DISABLE_TRIGGERS IS NULL OR @DISABLE_TRIGGERS = 0) THEN
        
        IF NEW.quantity > 0 THEN
            INSERT INTO entry (
                sena_code, 
                date_entry, 
                quantity, 
                observations, 
                article_id, 
                created_at, 
                updated_at
            )
            VALUES (
                CONCAT('COD-SENA-', NEW.id),
                CURDATE(),
                NEW.quantity, 
                'Descripción automática',
                NEW.id,
                NOW(),
                NOW()
            );
        END IF;

    END IF;
END