CREATE TRIGGER trg_article_entry_update 
AFTER UPDATE ON entry 
FOR EACH ROW 
BEGIN
    UPDATE article 
    SET quantity = quantity - OLD.quantity + NEW.quantity 
    WHERE id = NEW.article_id;
END