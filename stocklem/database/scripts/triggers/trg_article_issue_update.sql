CREATE TRIGGER trg_article_issue_update 
AFTER UPDATE ON issue 
FOR EACH ROW 
BEGIN
    UPDATE article
    SET quantity = quantity + OLD.quantity - NEW.quantity
    WHERE id = NEW.article_id;
END