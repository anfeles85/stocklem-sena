CREATE TRIGGER trg_article_issue_insert 
AFTER INSERT ON issue 
FOR EACH ROW 
BEGIN
    UPDATE article
    SET quantity = quantity - NEW.quantity
    WHERE id = NEW.article_id;
END