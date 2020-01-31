-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.29-0ubuntu0.18.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for cmsToMVC-biv
CREATE DATABASE IF NOT EXISTS `cmsToMVC-biv` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cmsToMVC-biv`;

-- Dumping structure for table cmsToMVC-biv.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `publicationDate` date NOT NULL,
  `categoryId` smallint(5) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` mediumtext NOT NULL,
  `publicationStatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Поле видимости статьи. По умолчанию, =0, статья не видима/опубликована.',
  `subCategoryId` smallint(5) unsigned DEFAULT NULL COMMENT 'Id подкатегории (ссылка на подкатегорию)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table cmsToMVC-biv.articles: ~9 rows (approximately)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `publicationDate`, `categoryId`, `title`, `summary`, `content`, `publicationStatus`, `subCategoryId`) VALUES
	(1, '2017-06-21', 1, 'Первопроходцы ', 'Это статья - первопроходец                                                ', 'Первопроходец - человек(или статья), проложивший новые пути, открывший новые земли                                                ', 1, 1),
	(2, '2017-06-21', 1, 'Неведомые земли', 'Каждый человек хотя бы раз просыпался с утра с будоражащим чувством, что сегодня он не вернётся домой.                                 ', 'Не так сложно отправиться в путь, как решиться на это. Лишь немногие посвятили свою жизнь познанию, изучению тайн нашей планеты. И ещё меньше тех, о ком мы знаем это наверняка. Но несмотря на это, они шли вперёд, и вклад их в общее дело велик.                                 ', 1, 1),
	(3, '2017-06-21', 1, 'Х. Колумб', 'Это итальянский мореплаватель, в 1492 году открывший для европейцев Америку, благодаря снаряжению экспедиций католическими королями.    ', 'Колумб первым из достоверно известных путешественников пересёк Атлантический океан в субтропической и тропической полосе северного полушария и первым из европейцев ходил в Карибском море и Саргассово море [2]. Он открыл и положил начало исследованию Южной и Центральной Америки, включая их континентальные части и близлежащие архипелаги — Большие Антильские (Куба, Гаити, Ямайка и Пуэрто-Рико), Малые Антильские (от Доминики до Виргинских островов, а также Тринидад) и Багамские острова.\r\n\r\nПервооткрывателем Америки Колумба можно назвать с оговорками, ведь ещё в Средние века на территории Северной Америки бывали европейцы в лице исландских викингов (см. Винланд). Но, поскольку за пределами Скандинавии сведений об этих походах не было, именно экспедиции Колумба впервые сделали сведения о землях на западе всеобщим достоянием и положили начало колонизации Америки европейцами.\r\n\r\nВсего Колумб совершил 4 плавания к Америке:\r\n\r\n    Первое плавание (3 августа 1492 — 15 марта 1493).\r\n    Второе плавание (25 сентября 1493 — 11 июня 1496).\r\n    Третье плавание (30 мая 1498 — 25 ноября 1500).\r\n    Четвёртое плавание (9 мая 1502 — 7 ноября 1504).\r\n    ', 1, 1),
	(4, '2017-06-21', 1, ' В. Янсзон и А.Тасман', ' Голландский мореплаватель и губернатор Виллем Янсзон стал первым европейцем, увидевшим побережье Австралии.', 'Янсзон отправился в своё третье плавание из Нидерландов к Ост-Индии 18 декабря 1603 года в качестве капитана Duyfken, одного из двенадцати судов большого флота Стивена ван дер Хагена (англ.)русск..[113] Уже в Ост-Индии Янсзон получил приказ отправиться на поиски новых торговых возможностей, в том числе в «к большой земле Новой Гвинеи и другим восточным и южным землям.» 18 ноября 1605 года Duyfken вышел из Бантама к западному берегу Новой Гвинеи. Янсзон пересёк восточную часть Арафурского моря, и, не увидев Торресов пролив, вошёл в залив Карпентария. 26 февраля 1606 года он высадился у реки Пеннефазер (англ.)русск. на западном берегу полуострова Кейп-Йорк в Квинсленде, рядом с современным городом Уэйпа. Это была первая задокументированная высадка европейцев на австралийский континент. Янсзон нанёс на карту около 320 км побережья, полагая, что это южное продолжение Новой Гвинеи. В 1615 году Якоб Лемер и Виллем Корнелис Схаутен, обойдя мыс Горн, доказали, что Огненная Земля является островом и не может быть северной частью неизвестного южного континента.\r\n\r\nВ 1642—1644 годах Абель Тасман, также голландский исследователь и купец на службе VOC, обошёл вокруг Новой Голландии, доказав, что Австралия не является частью мифического южного континента. Он стал первым европейцем, достигшим острова Земля Ван-Димена (сегодня Тасмания) и Новой Зеландии, а также в 1643 году наблюдал острова Фиджи. Тасман, его капитан Вискер и купец Гилсманс также нанесли на карту отдельные участки Австралии, Новой Зеландии и тихоокеанских островов.', 0, 1),
	(5, '2017-06-21', 3, 'Description ', 'Выполняет поиск и замену по регулярному выражению  ', ' mixed preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )\r\n\r\nВыполняет поиск совпадений в строке subject с шаблоном pattern и заменяет их на replacement. \r\n\r\n preg_replace() возвращает массив, если параметр subject является массивом, иначе возвращается строка. Если найдены совпадения, возвращается новая версия subject, иначе subject возвращается нетронутым, в случае ошибки возвращается NULL.\r\n\r\nС версии PHP 5.5.0, если передается модификатор "\\e", вызывается ошибка уровня E_DEPRECATED. С версии PHP 7.0.0 в этом случае выдается E_WARNING и сам модификатор игнорируется.\r\n\r\nPHP 7.0.0: Удалена поддержка модификатора /e. Вместо него используйте preg_replace_callback(). ', 0, 3),
	(6, '2017-06-21', 1, 'С.И. Дежнёв', 'Искони известна тяга русского человека к неизведанным местам. Казак Семен Дежнев первым из европейцев отделил Евразию от Америки, вышел в Тихий океан. Он и его собратья бродили на утлых лодьях по Великому океану вдоль Курильской гряды. Эти люди, их спутники и последователи не искали славы и золота, они были подвижниками, следопытами.', 'Семён Иванович Дежнёв (ок. 1605, Великий Устюг — нач. 1673, Москва) — выдающийся русский мореход, землепроходец, путешественник, исследователь Северной и Восточной Сибири, казачий атаман, а также торговец пушниной, первый из известных европейских мореплавателей, в 1648 году, на 80 лет раньше, чем Витус Беринг, прошёл Берингов пролив, отделяющий Аляску от Чукотки.\r\nПримечательно, что Берингу не удалось пройти весь пролив целиком, а пришлось ограничиться плаванием только в его южной части, тогда как Дежнёв прошёл пролив с севера на юг, по всей его длине.\r\nЗа 40 лет пребывания в Сибири Дежнев участвовал в многочисленных боях и стычках, имел не менее 13 ранений, включая три тяжелых. Судя по письменным свидетельствам, его отличали надежность, честность и миролюбие, стремление исполнить дело без кровопролития.\r\nИменем Дежнева названы мыс, остров, бухта, полуостров и село. В центре Великого Устюга в 1972 году ему установлен памятник.', 0, 1),
	(7, '2020-01-14', 3, 'Верная статья', 'Верная статья', 'Верная статья', 1, 4),
	(14, '2020-01-24', 1, 'Извлечение данных', 'Извлечение данных                                    ', 'Рассмотрим задачу извлечения данных более подробно, для этого воспользуемся таб-\r\nлицей catalogs из листинга 37.10. В листинге 37.17 представлен скрипт, выводящий\r\nсодержимое таблицы в окно браузера.                                    ', 1, 1),
	(21, '2020-01-24', 2, 'Суперинтересная статья', 'Суперинтересная статья', 'Суперинтересная статья', 1, 3);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Dumping structure for table cmsToMVC-biv.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table cmsToMVC-biv.categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `description`) VALUES
	(1, 'Первый сорт', 'Это первая созданная категория, она была отредактирована после отладки ошибок'),
	(2, 'Новейшая категория', 'Описание новейшей категории'),
	(3, 'Статьи про preg_replace', 'Здесь будут сохранены факты о функции preg_replace с целью понять, зачем же она понадобилась создателю сайта');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table cmsToMVC-biv.subCategories
CREATE TABLE IF NOT EXISTS `subCategories` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id подкатегории',
  `name` varchar(50) NOT NULL COMMENT 'Название подкатегории',
  `categoryId` smallint(5) unsigned DEFAULT NULL COMMENT 'Id категории (ссылка на категорию)',
  PRIMARY KEY (`id`),
  KEY `categoryId` (`categoryId`),
  CONSTRAINT `subCategories` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table cmsToMVC-biv.subCategories: ~4 rows (approximately)
/*!40000 ALTER TABLE `subCategories` DISABLE KEYS */;
INSERT INTO `subCategories` (`id`, `name`, `categoryId`) VALUES
	(1, 'Первая подкатегория(1категория)', 1),
	(2, 'Вторая подкатегория(1категория)', 1),
	(3, 'Третья Подкатегория(2категория)', 3),
	(4, 'Четвертая подкатегория (2категория)', 3),
	(5, 'Итераторы и генераторы', 2);
/*!40000 ALTER TABLE `subCategories` ENABLE KEYS */;

-- Dumping structure for table cmsToMVC-biv.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `timestamp` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `salt` int(11) NOT NULL,
  `role` varchar(25) NOT NULL,
  `activityStatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Статус активности\n пользователя, по умолчанию = 1, т.е. активен',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table cmsToMVC-biv.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `pass`, `timestamp`, `email`, `salt`, `role`, `activityStatus`) VALUES
	(1, 'ilya', '$2y$10$EE4PQlwFpR5hKPxd3chCMO/Xyd3FxK67OmHkqngX/JSzvEnyLhhmy', '2020-01-23', 'sdfa', 433155, 'admin', 1),
	(2, 'max', '$2y$10$cJIJBd/6z5xCi5QSm79jyuoBkXSIzJjCnWmus1RY0oEdRKzIwg2JS', '2020-01-23', 'sdfjjd@gmail.ru', 430336, 'auth_user', 1),
	(3, 'joe', '$2y$10$u6xSHryupautx71xH9EB5.wpPC5vrwZfIm3QNNdvFm5BhOOXynKZW', '2020-01-23', 'notanadmin@yandex.ru', 822336, 'auth_user', 0),
	(4, 'alice', '$2y$10$LwkKRrqV5NGJtXzIF82p6eHYNx.H.ia97m1G3ayExuFYpAWa8qKzK', '2020-01-23', 'alice@gmail.com', 916931, 'admin', 1),
	(5, 'john', '$2y$10$QrfwABW9hF6sH2Q9Ta9VL.ZZm92Iu0bo90HHBhsOvUM4njIa0suzG', '2020-01-23', 'randommail@gmail.com', 28341, 'admin', 1),
	(6, 'admin', '$2y$10$qqjS1Tlv0FIOKaKYg9oHTu2w1pR4muHbs7eyJB2udVH9JELhCwZua', '2020-01-27', 'random@email.com', 247410, 'admin', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table cmsToMVC-biv.users_article
CREATE TABLE IF NOT EXISTS `users_article` (
  `user_id` smallint(6) NOT NULL COMMENT 'Ссылка на пользователя',
  `article_id` smallint(5) unsigned NOT NULL COMMENT 'Ссылка на статью',
  PRIMARY KEY (`user_id`,`article_id`),
  KEY `article_id` (`article_id`),
  CONSTRAINT `users_article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `users_article_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Статья для связи авторов статей и статей';

-- Dumping data for table cmsToMVC-biv.users_article: ~11 rows (approximately)
/*!40000 ALTER TABLE `users_article` DISABLE KEYS */;
INSERT INTO `users_article` (`user_id`, `article_id`) VALUES
	(1, 1),
	(2, 1),
	(6, 1),
	(1, 2),
	(2, 2),
	(6, 2),
	(4, 3),
	(5, 3),
	(3, 7),
	(3, 14),
	(3, 21);
/*!40000 ALTER TABLE `users_article` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;