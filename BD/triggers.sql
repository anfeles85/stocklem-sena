-- 1. trigger actualización de stock de articulos despues de insertar salida
CREATE DEFINER=`developer`@`%` TRIGGER `trg_article_issue_insert` AFTER INSERT ON `issue` FOR EACH ROW BEGIN
	UPDATE article
	SET article.quantity = article.quantity - NEW.quantity
	WHERE article.id = NEW.article_id;
END


-- 2. trigger actualización de stock de articulos despues de actualizar salida
CREATE DEFINER=`developer`@`%` TRIGGER `trg_article_issue_update` AFTER UPDATE ON `issue` FOR EACH ROW BEGIN
	UPDATE article
	SET article.quantity = article.quantity - NEW.quantity
	WHERE article.id = NEW.article_id;
END


-- 3. creación del trigger insert de entry
CREATE DEFINER=`developer`@`%` TRIGGER `trg_article_entry_insert` AFTER INSERT ON `entry` FOR EACH ROW BEGIN
	UPDATE article 
   SET quantity = quantity + NEW.quantity 
   WHERE id = NEW.article_id;
END


-- 4. creación del trigger update de entry
CREATE DEFINER=`developer`@`%` TRIGGER `trg_article_entry_update` AFTER UPDATE ON `entry` FOR EACH ROW BEGIN
   UPDATE article 
   SET quantity = (quantity - OLD.quantity) + NEW.quantity 
   WHERE id = NEW.article_id;
END