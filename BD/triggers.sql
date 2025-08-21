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