-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.16 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных rero
DROP DATABASE IF EXISTS `rero`;
CREATE DATABASE IF NOT EXISTS `rero` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `rero`;

-- Дамп структуры для таблица rero.activations
DROP TABLE IF EXISTS `activations`;
CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.activations: ~0 rows (приблизительно)
DELETE FROM `activations`;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
	(1, 1, '7JtQiTWoIlEH995kgwGXJHEmvkDtx81B', 1, '2017-09-07 10:24:16', '2017-09-07 10:24:16', '2017-09-07 10:24:16');
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.blog__categories
DROP TABLE IF EXISTS `blog__categories`;
CREATE TABLE IF NOT EXISTS `blog__categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.blog__categories: ~0 rows (приблизительно)
DELETE FROM `blog__categories`;
/*!40000 ALTER TABLE `blog__categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog__categories` ENABLE KEYS */;

-- Дамп структуры для таблица rero.blog__category_translations
DROP TABLE IF EXISTS `blog__category_translations`;
CREATE TABLE IF NOT EXISTS `blog__category_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog__category_translations_category_id_locale_unique` (`category_id`,`locale`),
  KEY `blog__category_translations_locale_index` (`locale`),
  CONSTRAINT `blog__category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog__categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.blog__category_translations: ~0 rows (приблизительно)
DELETE FROM `blog__category_translations`;
/*!40000 ALTER TABLE `blog__category_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog__category_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.blog__posts
DROP TABLE IF EXISTS `blog__posts`;
CREATE TABLE IF NOT EXISTS `blog__posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog__posts_category_id_index` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.blog__posts: ~0 rows (приблизительно)
DELETE FROM `blog__posts`;
/*!40000 ALTER TABLE `blog__posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog__posts` ENABLE KEYS */;

-- Дамп структуры для таблица rero.blog__post_tag
DROP TABLE IF EXISTS `blog__post_tag`;
CREATE TABLE IF NOT EXISTS `blog__post_tag` (
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.blog__post_tag: ~0 rows (приблизительно)
DELETE FROM `blog__post_tag`;
/*!40000 ALTER TABLE `blog__post_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog__post_tag` ENABLE KEYS */;

-- Дамп структуры для таблица rero.blog__post_translations
DROP TABLE IF EXISTS `blog__post_translations`;
CREATE TABLE IF NOT EXISTS `blog__post_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog__post_translations_post_id_locale_unique` (`post_id`,`locale`),
  KEY `blog__post_translations_locale_index` (`locale`),
  CONSTRAINT `blog__post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `blog__posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.blog__post_translations: ~0 rows (приблизительно)
DELETE FROM `blog__post_translations`;
/*!40000 ALTER TABLE `blog__post_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog__post_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.blog__tags
DROP TABLE IF EXISTS `blog__tags`;
CREATE TABLE IF NOT EXISTS `blog__tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.blog__tags: ~0 rows (приблизительно)
DELETE FROM `blog__tags`;
/*!40000 ALTER TABLE `blog__tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog__tags` ENABLE KEYS */;

-- Дамп структуры для таблица rero.blog__tag_translations
DROP TABLE IF EXISTS `blog__tag_translations`;
CREATE TABLE IF NOT EXISTS `blog__tag_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog__tag_translations_tag_id_locale_unique` (`tag_id`,`locale`),
  KEY `blog__tag_translations_locale_index` (`locale`),
  CONSTRAINT `blog__tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `blog__tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.blog__tag_translations: ~0 rows (приблизительно)
DELETE FROM `blog__tag_translations`;
/*!40000 ALTER TABLE `blog__tag_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog__tag_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.dashboard__widgets
DROP TABLE IF EXISTS `dashboard__widgets`;
CREATE TABLE IF NOT EXISTS `dashboard__widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `widgets` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dashboard__widgets_user_id_foreign` (`user_id`),
  CONSTRAINT `dashboard__widgets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.dashboard__widgets: ~0 rows (приблизительно)
DELETE FROM `dashboard__widgets`;
/*!40000 ALTER TABLE `dashboard__widgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard__widgets` ENABLE KEYS */;

-- Дамп структуры для таблица rero.dishes__dishcategories
DROP TABLE IF EXISTS `dishes__dishcategories`;
CREATE TABLE IF NOT EXISTS `dishes__dishcategories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.dishes__dishcategories: ~3 rows (приблизительно)
DELETE FROM `dishes__dishcategories`;
/*!40000 ALTER TABLE `dishes__dishcategories` DISABLE KEYS */;
INSERT INTO `dishes__dishcategories` (`id`, `created_at`, `updated_at`) VALUES
	(1, '2017-09-08 10:47:45', '2017-09-08 10:47:45'),
	(2, '2017-09-12 03:16:40', '2017-09-12 03:16:40'),
	(3, '2017-09-12 03:18:11', '2017-09-12 03:18:11');
/*!40000 ALTER TABLE `dishes__dishcategories` ENABLE KEYS */;

-- Дамп структуры для таблица rero.dishes__dishcategory_translations
DROP TABLE IF EXISTS `dishes__dishcategory_translations`;
CREATE TABLE IF NOT EXISTS `dishes__dishcategory_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dish_category_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teaser` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `on_main` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `dishes__dishcategory_translations_dish_category_id_locale_unique` (`dish_category_id`,`locale`),
  KEY `dishes__dishcategory_translations_locale_index` (`locale`),
  CONSTRAINT `dishes__dishcategory_translations_dish_category_id_foreign` FOREIGN KEY (`dish_category_id`) REFERENCES `dishes__dishcategories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.dishes__dishcategory_translations: ~6 rows (приблизительно)
DELETE FROM `dishes__dishcategory_translations`;
/*!40000 ALTER TABLE `dishes__dishcategory_translations` DISABLE KEYS */;
INSERT INTO `dishes__dishcategory_translations` (`id`, `dish_category_id`, `locale`, `title`, `teaser`, `status`, `on_main`) VALUES
	(1, 1, 'en', 'First dishes', 'Some description for first dishes', 0, 0),
	(2, 1, 'ru', 'Первые блюда', 'Какое нибудь описание для первых блюд', 0, 0),
	(3, 2, 'en', 'Second dishes', 'Some description for second dishes', 0, 0),
	(4, 2, 'ru', 'Вторые блюда', 'Какое нибудь описание для вторых блюд', 0, 0),
	(5, 3, 'en', 'Deserts', 'some description for deserts', 0, 0),
	(6, 3, 'ru', 'Десерты', 'Какое нибудь описание для десертов', 0, 0);
/*!40000 ALTER TABLE `dishes__dishcategory_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.dishes__dishes
DROP TABLE IF EXISTS `dishes__dishes`;
CREATE TABLE IF NOT EXISTS `dishes__dishes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.dishes__dishes: ~3 rows (приблизительно)
DELETE FROM `dishes__dishes`;
/*!40000 ALTER TABLE `dishes__dishes` DISABLE KEYS */;
INSERT INTO `dishes__dishes` (`id`, `category_id`, `price`, `created_at`, `updated_at`) VALUES
	(1, 1, 50, '2017-09-08 10:48:53', '2017-09-12 03:30:25'),
	(2, 2, 100, '2017-09-12 10:37:17', '2017-09-12 10:47:19'),
	(3, 3, 200, '2017-09-12 10:45:58', '2017-09-12 10:45:58');
/*!40000 ALTER TABLE `dishes__dishes` ENABLE KEYS */;

-- Дамп структуры для таблица rero.dishes__dish_translations
DROP TABLE IF EXISTS `dishes__dish_translations`;
CREATE TABLE IF NOT EXISTS `dishes__dish_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dish_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_contain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `on_main` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `dishes__dish_translations_dish_id_locale_unique` (`dish_id`,`locale`),
  KEY `dishes__dish_translations_locale_index` (`locale`),
  CONSTRAINT `dishes__dish_translations_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes__dishes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.dishes__dish_translations: ~6 rows (приблизительно)
DELETE FROM `dishes__dish_translations`;
/*!40000 ALTER TABLE `dishes__dish_translations` DISABLE KEYS */;
INSERT INTO `dishes__dish_translations` (`id`, `dish_id`, `locale`, `title`, `short_contain`, `full_description`, `status`, `on_main`) VALUES
	(1, 1, 'en', 'Soup of peasants', 'Chicken - 0,5 pcs, Millet - 100 g, Potatoes - 4-5 pcs, Fresh herbs - 4-5 sprigs', '<p>We suggest you include a soup menu of peasant soup. It is not difficult to guess that such a name is the first dish, thanks to the use of simple and accessible ingredients. Our option is peasant soup on chicken broth. The food is rich and rich.</p>\r\n', 1, 1),
	(2, 1, 'ru', 'Суп крестьянский', 'Курица - 0,5 шт, Пшено - 100 г, Картофель - 4-5 шт,  Зелень свежая - 4-5 веточек', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif, serif; font-size: 16px; background-color: rgb(255, 249, 242);">Предлагаем вам включить в обеденное меню крестьянский суп. Нетрудно догадаться, что такое называние первое блюдо получило благодаря использованию простых и доступных ингредиентов. Наш вариант - это крестьянский суп на курином бульоне. Кушанье получается сытным и наваристым.</span></p>\r\n', 1, 1),
	(3, 2, 'en', 'Baked meat with potatoes and cheese', 'Pork pulp, Potatoes, Bulb, Cheese, Salt, pepper', '<p>Baked meat in the oven with potatoes under a crispy cheese crust, hearty and easy to prepare a dish that will conquer any man.</p>\r\n', 1, 1),
	(4, 2, 'ru', 'Запеченное мясо с картофелем и сыром', 'Мякоть свинины, Картофель, Луковица, Сыр, Соль, перец', '<p>Запеченное в духовке мясо с картофелем под хрустящей сырной корочкой, сытное и легкое в приготовлении блюдо, которое покорит любого мужчину.</p>\r\n', 1, 1),
	(5, 3, 'en', 'Cake with raspberries', 'Cake, raspberries', '', 1, 1),
	(6, 3, 'ru', 'Тортик с малинками', 'Торт, малина', '', 1, 1);
/*!40000 ALTER TABLE `dishes__dish_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.feedbacks__feedback
DROP TABLE IF EXISTS `feedbacks__feedback`;
CREATE TABLE IF NOT EXISTS `feedbacks__feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.feedbacks__feedback: ~0 rows (приблизительно)
DELETE FROM `feedbacks__feedback`;
/*!40000 ALTER TABLE `feedbacks__feedback` DISABLE KEYS */;
INSERT INTO `feedbacks__feedback` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Аппасова Гульмира', 'test@mail.ru', '<p>Хотела добавить свой отзыв. На 22 марта были в Боровом, хотелось покушать очень вкусно, искали но не нашли. На обратном пути увидели случайно кафе Рэро. заказали с семьей, жаркое было очень отменным, все было вкусно, печеные в духовке котлеты куриные очень был кстати для ребенка! Плов очень вкусный! мясо очень мягкое! Всем рекомендую!</p>\r\n', 1, '2017-09-12 11:17:38', '2017-09-12 11:18:41'),
	(3, 'Диана', 'diana@mail.ru', '<p>Уже больше 5 лет хожу в кафе Рэро, сначала с подругами, а теперь уже с семьей )). очень нравится обслуживание, меню. Всё так вкусно, что непременно хочется возвращаться с каждым разом. Желаю всему коллективу только процветания, здоровья, исполнения желаний! пусть то тепло и уют, который Вы все дарите будет и в ваших домах!</p>\r\n', 1, '2017-09-12 11:18:12', '2017-09-12 11:18:12'),
	(4, 'Владимир', 'vladimir_test@mail.ru', '<p>Здравствуйте, хотел бы всем порекомендовать этот ресторан за отличное обслуживание, культурный персонал, вкусную еду. Все очень понравилось. Обязательно когда буду в Питере опять приду в этот ресторан. Особенно понравилась шоу программа с певицей</p>\r\n', 1, '2017-09-12 11:19:43', '2017-09-12 11:19:43'),
	(5, 'Амир', 'amir@mail.ru', '<p>Добрый день. Хочу передать слова благодарности в адрес руководства и персонала &quot;Рэро&quot; от ветерана войны Ахметовой Нуршиды Шариповны, которая 9 мая 2014 года в день победы и в свой день рождения посетила ваш ресторан. Теплая атмосфера, прекрасная кухня и внимание к гостям не могли не вызвать у нее восхищение высоким уровнем сервиса. Нуршида Шариповна передает пожелания процветания &quot;Рэро&quot; и благополучия всем его сотрудникам.</p>\r\n', 1, '2017-09-12 11:26:57', '2017-09-12 11:27:39');
/*!40000 ALTER TABLE `feedbacks__feedback` ENABLE KEYS */;

-- Дамп структуры для таблица rero.mainpage__mainpages
DROP TABLE IF EXISTS `mainpage__mainpages`;
CREATE TABLE IF NOT EXISTS `mainpage__mainpages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_button_show` tinyint(4) NOT NULL DEFAULT '0',
  `dishes_categories_show` tinyint(4) NOT NULL DEFAULT '0',
  `dishes_menu_show` tinyint(4) NOT NULL DEFAULT '0',
  `dishes_show` tinyint(4) NOT NULL DEFAULT '0',
  `gallery_show` tinyint(4) NOT NULL DEFAULT '0',
  `feedbacks_show` tinyint(4) NOT NULL DEFAULT '0',
  `addition_content_show` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.mainpage__mainpages: ~0 rows (приблизительно)
DELETE FROM `mainpage__mainpages`;
/*!40000 ALTER TABLE `mainpage__mainpages` DISABLE KEYS */;
/*!40000 ALTER TABLE `mainpage__mainpages` ENABLE KEYS */;

-- Дамп структуры для таблица rero.mainpage__mainpage_translations
DROP TABLE IF EXISTS `mainpage__mainpage_translations`;
CREATE TABLE IF NOT EXISTS `mainpage__mainpage_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mainpage_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slogan_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `welcome_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `show_menu_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `our_menu_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `our_menu_addition_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `show_full_menu_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leave_feedback_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leave_feedback_addition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `copyrights` text COLLATE utf8_unicode_ci NOT NULL,
  `addition_content_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addition_content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mainpage__mainpage_translations_mainpage_id_locale_unique` (`mainpage_id`,`locale`),
  KEY `mainpage__mainpage_translations_locale_index` (`locale`),
  CONSTRAINT `mainpage__mainpage_translations_mainpage_id_foreign` FOREIGN KEY (`mainpage_id`) REFERENCES `mainpage__mainpages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.mainpage__mainpage_translations: ~0 rows (приблизительно)
DELETE FROM `mainpage__mainpage_translations`;
/*!40000 ALTER TABLE `mainpage__mainpage_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `mainpage__mainpage_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.mats__matcategories
DROP TABLE IF EXISTS `mats__matcategories`;
CREATE TABLE IF NOT EXISTS `mats__matcategories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_type` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.mats__matcategories: ~2 rows (приблизительно)
DELETE FROM `mats__matcategories`;
/*!40000 ALTER TABLE `mats__matcategories` DISABLE KEYS */;
INSERT INTO `mats__matcategories` (`id`, `category_type`, `status`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, '2017-09-08 05:59:15', '2017-09-08 09:23:20'),
	(2, 2, 1, '2017-09-08 06:24:27', '2017-09-08 09:23:03'),
	(3, 1, 1, '2017-09-08 09:13:15', '2017-09-08 09:23:10'),
	(4, 1, 1, '2017-09-09 07:23:19', '2017-09-09 07:23:19');
/*!40000 ALTER TABLE `mats__matcategories` ENABLE KEYS */;

-- Дамп структуры для таблица rero.mats__matcategory_translations
DROP TABLE IF EXISTS `mats__matcategory_translations`;
CREATE TABLE IF NOT EXISTS `mats__matcategory_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mat_category_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teaser` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mats__matcategory_translations_mat_category_id_locale_unique` (`mat_category_id`,`locale`),
  KEY `mats__matcategory_translations_locale_index` (`locale`),
  CONSTRAINT `mats__matcategory_translations_mat_category_id_foreign` FOREIGN KEY (`mat_category_id`) REFERENCES `mats__matcategories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.mats__matcategory_translations: ~8 rows (приблизительно)
DELETE FROM `mats__matcategory_translations`;
/*!40000 ALTER TABLE `mats__matcategory_translations` DISABLE KEYS */;
INSERT INTO `mats__matcategory_translations` (`id`, `mat_category_id`, `locale`, `title`, `teaser`) VALUES
	(1, 1, 'en', 'awdawddrgdrg', 'awdawddrgdrg'),
	(2, 2, 'en', 'Test category', 'Test category'),
	(3, 2, 'ru', 'Тест категория', 'Тест категория'),
	(4, 1, 'ru', 'drgdr', 'drgdr'),
	(5, 3, 'en', 'wdadfaw', 'wdadfaw'),
	(6, 3, 'ru', 'dawdawd', 'dawdawd'),
	(7, 4, 'en', 'Важные новости', 'Важные новости'),
	(8, 4, 'ru', 'Важные новости', 'Важные новости');
/*!40000 ALTER TABLE `mats__matcategory_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.mats__mats
DROP TABLE IF EXISTS `mats__mats`;
CREATE TABLE IF NOT EXISTS `mats__mats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `mat_type` tinyint(4) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.mats__mats: ~2 rows (приблизительно)
DELETE FROM `mats__mats`;
/*!40000 ALTER TABLE `mats__mats` DISABLE KEYS */;
INSERT INTO `mats__mats` (`id`, `status`, `mat_type`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 0, '2017-09-09 06:07:02', '2017-09-10 03:43:50'),
	(2, 1, 1, 0, '2017-09-09 08:11:42', '2017-09-11 08:42:25'),
	(3, 1, 4, 0, '2017-09-11 09:15:42', '2017-09-11 09:15:42');
/*!40000 ALTER TABLE `mats__mats` ENABLE KEYS */;

-- Дамп структуры для таблица rero.mats__mat_translations
DROP TABLE IF EXISTS `mats__mat_translations`;
CREATE TABLE IF NOT EXISTS `mats__mat_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mat_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teaser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mats__mat_translations_mat_id_locale_unique` (`mat_id`,`locale`),
  KEY `mats__mat_translations_locale_index` (`locale`),
  CONSTRAINT `mats__mat_translations_mat_id_foreign` FOREIGN KEY (`mat_id`) REFERENCES `mats__mats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.mats__mat_translations: ~6 rows (приблизительно)
DELETE FROM `mats__mat_translations`;
/*!40000 ALTER TABLE `mats__mat_translations` DISABLE KEYS */;
INSERT INTO `mats__mat_translations` (`id`, `mat_id`, `locale`, `title`, `teaser`, `full_description`) VALUES
	(1, 1, 'en', 'sef', 'sefsefsef', '<p>hdthtfb</p>\r\n'),
	(2, 1, 'ru', 'dghdrtg', 'drg', '<p>sefsefgdf</p>\r\n'),
	(3, 2, 'en', 'q2q2eq2e', 'q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2 q2eq2q2eq2 q2eq2 q2eq2 q2eq', '<p>eq2eq2</p>\r\n'),
	(4, 2, 'ru', 'q2eq2e', 'esgseg', '<p>q2erq2e</p>\r\n'),
	(5, 3, 'en', 'dwad', 'asdawdas', '<p>awdad</p>\r\n'),
	(6, 3, 'ru', 'awdawd', 'awdawd', '<p>awdawd</p>\r\n');
/*!40000 ALTER TABLE `mats__mat_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.media__files
DROP TABLE IF EXISTS `media__files`;
CREATE TABLE IF NOT EXISTS `media__files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mimetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filesize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `folder_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.media__files: ~15 rows (приблизительно)
DELETE FROM `media__files`;
/*!40000 ALTER TABLE `media__files` DISABLE KEYS */;
INSERT INTO `media__files` (`id`, `filename`, `path`, `extension`, `mimetype`, `filesize`, `folder_id`, `created_at`, `updated_at`) VALUES
	(1, 'depositphotos-11960794-stock-photo-casual-man-with-arms-crossed.jpg', '/assets/media/depositphotos-11960794-stock-photo-casual-man-with-arms-crossed.jpg', 'jpg', 'image/jpeg', '81161', 0, '2017-09-08 08:42:15', '2017-09-08 08:42:15'),
	(2, 'pizza-baking-fast-food-lunch-business-lunch-restaurant-snacks-food-1198767.jpg', '/assets/media/pizza-baking-fast-food-lunch-business-lunch-restaurant-snacks-food-1198767.jpg', 'jpg', 'image/jpeg', '204446', 0, '2017-09-08 08:42:32', '2017-09-08 08:42:32'),
	(3, 'buddha-bar-restaurant.jpg', '/assets/media/buddha-bar-restaurant.jpg', 'jpg', 'image/jpeg', '126032', 0, '2017-09-11 11:26:11', '2017-09-11 11:26:11'),
	(4, 'bg-restaurant.jpg', '/assets/media/bg-restaurant.jpg', 'jpg', 'image/jpeg', '1157977', 0, '2017-09-11 11:26:11', '2017-09-11 11:26:11'),
	(5, '4f7cf433812a956f78024f49616713b3503a9d67.jpg', '/assets/media/4f7cf433812a956f78024f49616713b3503a9d67.jpg', 'jpg', 'image/jpeg', '100289', 0, '2017-09-11 11:26:11', '2017-09-11 11:26:11'),
	(6, 'news1495707806.jpg', '/assets/media/news1495707806.jpg', 'jpg', 'image/jpeg', '531877', 0, '2017-09-11 11:26:12', '2017-09-11 11:26:12'),
	(7, 'restoran-lrk.jpg', '/assets/media/restoran-lrk.jpg', 'jpg', 'image/jpeg', '1069391', 0, '2017-09-11 11:26:12', '2017-09-11 11:26:12'),
	(8, 'restoran-regent-1.jpg', '/assets/media/restoran-regent-1.jpg', 'jpg', 'image/jpeg', '441502', 0, '2017-09-11 11:26:13', '2017-09-11 11:26:13'),
	(9, '1350373127-vkusnie-vtorie-bluda.jpg', '/assets/media/1350373127-vkusnie-vtorie-bluda.jpg', 'jpg', 'image/jpeg', '500048', 0, '2017-09-12 03:16:23', '2017-09-12 03:16:23'),
	(10, 'recepti-sladkih-blyud.jpg', '/assets/media/recepti-sladkih-blyud.jpg', 'jpg', 'image/jpeg', '49623', 0, '2017-09-12 03:18:04', '2017-09-12 03:18:04'),
	(11, 'big-160219.jpg', '/assets/media/big-160219.jpg', 'jpg', 'image/jpeg', '117190', 0, '2017-09-12 03:26:57', '2017-09-12 03:26:57'),
	(12, 'krestyanskiy-sup-9.jpg', '/assets/media/krestyanskiy-sup-9.jpg', 'jpg', 'image/jpeg', '151054', 0, '2017-09-12 03:30:14', '2017-09-12 03:30:14'),
	(13, 'f7cb8b3e578430a7b0f1d25664d80b77.jpg', '/assets/media/f7cb8b3e578430a7b0f1d25664d80b77.jpg', 'jpg', 'image/jpeg', '119507', 0, '2017-09-12 03:30:14', '2017-09-12 03:30:14'),
	(14, 'zapechennoe-myaso-s-kartofelem-i-syrom.jpg', '/assets/media/zapechennoe-myaso-s-kartofelem-i-syrom.jpg', 'jpg', 'image/jpeg', '433386', 0, '2017-09-12 10:29:58', '2017-09-12 10:29:58'),
	(15, 'recepti-desertov-s-foto.jpg', '/assets/media/recepti-desertov-s-foto.jpg', 'jpg', 'image/jpeg', '42354', 0, '2017-09-12 10:44:28', '2017-09-12 10:44:28'),
	(16, '97-restorany.jpg', '/assets/media/97-restorany.jpg', 'jpg', 'image/jpeg', '150918', 0, '2017-09-12 12:10:07', '2017-09-12 12:10:07'),
	(17, 'bg-restaurant_1.jpg', '/assets/media/bg-restaurant_1.jpg', 'jpg', 'image/jpeg', '1157977', 0, '2017-09-12 12:10:07', '2017-09-12 12:10:07'),
	(18, '4f7cf433812a956f78024f49616713b3503a9d67_1.jpg', '/assets/media/4f7cf433812a956f78024f49616713b3503a9d67_1.jpg', 'jpg', 'image/jpeg', '100289', 0, '2017-09-12 12:10:07', '2017-09-12 12:10:07'),
	(19, 'img-9733-h1000-retouch.jpg', '/assets/media/img-9733-h1000-retouch.jpg', 'jpg', 'image/jpeg', '448481', 0, '2017-09-12 12:10:08', '2017-09-12 12:10:08'),
	(20, 'news1495707806_1.jpg', '/assets/media/news1495707806_1.jpg', 'jpg', 'image/jpeg', '531877', 0, '2017-09-12 12:10:08', '2017-09-12 12:10:08'),
	(21, 'restoran-lrk_1.jpg', '/assets/media/restoran-lrk_1.jpg', 'jpg', 'image/jpeg', '1069391', 0, '2017-09-12 12:10:09', '2017-09-12 12:10:09'),
	(22, 'restoran-regent-1_1.jpg', '/assets/media/restoran-regent-1_1.jpg', 'jpg', 'image/jpeg', '441502', 0, '2017-09-12 12:10:10', '2017-09-12 12:10:10'),
	(23, 'buddha-bar-restaurant_1.jpg', '/assets/media/buddha-bar-restaurant_1.jpg', 'jpg', 'image/jpeg', '126032', 0, '2017-09-12 12:10:11', '2017-09-12 12:10:11');
/*!40000 ALTER TABLE `media__files` ENABLE KEYS */;

-- Дамп структуры для таблица rero.media__file_translations
DROP TABLE IF EXISTS `media__file_translations`;
CREATE TABLE IF NOT EXISTS `media__file_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt_attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media__file_translations_file_id_locale_unique` (`file_id`,`locale`),
  KEY `media__file_translations_locale_index` (`locale`),
  CONSTRAINT `media__file_translations_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `media__files` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.media__file_translations: ~0 rows (приблизительно)
DELETE FROM `media__file_translations`;
/*!40000 ALTER TABLE `media__file_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `media__file_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.media__imageables
DROP TABLE IF EXISTS `media__imageables`;
CREATE TABLE IF NOT EXISTS `media__imageables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.media__imageables: ~15 rows (приблизительно)
DELETE FROM `media__imageables`;
/*!40000 ALTER TABLE `media__imageables` DISABLE KEYS */;
INSERT INTO `media__imageables` (`id`, `file_id`, `imageable_id`, `imageable_type`, `zone`, `order`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'Modules\\Mats\\Entities\\MatCategory', 'MatsCategory', NULL, '2017-09-08 08:43:14', '2017-09-08 09:23:03'),
	(3, 2, 1, 'Modules\\Mats\\Entities\\Mat', 'MatsGallery', 0, '2017-09-09 06:07:02', '2017-09-10 03:43:50'),
	(4, 1, 1, 'Modules\\Mats\\Entities\\Mat', 'MatsGallery', 1, '2017-09-09 06:07:02', '2017-09-10 03:43:50'),
	(5, 2, 1, 'Modules\\Mats\\Entities\\Mat', 'Mats', NULL, '2017-09-09 06:07:02', '2017-09-10 03:43:50'),
	(6, 8, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryBg', 0, '2017-09-11 12:49:18', '2017-09-12 12:10:29'),
	(7, 7, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryBg', 1, '2017-09-11 12:49:18', '2017-09-12 12:10:29'),
	(8, 6, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryBg', 2, '2017-09-11 12:49:18', '2017-09-12 12:10:29'),
	(9, 2, 1, 'Modules\\Dishes\\Entities\\DishCategory', 'DishesCategory', NULL, '2017-09-11 13:15:43', '2017-09-12 03:13:55'),
	(10, 9, 2, 'Modules\\Dishes\\Entities\\DishCategory', 'DishesCategory', NULL, '2017-09-12 03:16:40', '2017-09-12 03:16:40'),
	(11, 10, 3, 'Modules\\Dishes\\Entities\\DishCategory', 'DishesCategory', NULL, '2017-09-12 03:18:11', '2017-09-12 03:18:11'),
	(12, 13, 1, 'Modules\\Dishes\\Entities\\Dish', 'DishesGallery', 0, '2017-09-12 03:30:25', '2017-09-12 03:30:25'),
	(13, 12, 1, 'Modules\\Dishes\\Entities\\Dish', 'DishesGallery', 1, '2017-09-12 03:30:25', '2017-09-12 03:30:25'),
	(14, 11, 1, 'Modules\\Dishes\\Entities\\Dish', 'Dishes', NULL, '2017-09-12 03:30:25', '2017-09-12 03:30:25'),
	(15, 14, 2, 'Modules\\Dishes\\Entities\\Dish', 'Dishes', NULL, '2017-09-12 10:37:17', '2017-09-12 10:47:19'),
	(16, 15, 3, 'Modules\\Dishes\\Entities\\Dish', 'Dishes', NULL, '2017-09-12 10:45:58', '2017-09-12 10:45:58'),
	(17, 23, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryAbout', 0, '2017-09-12 12:10:29', '2017-09-12 12:10:29'),
	(18, 22, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryAbout', 1, '2017-09-12 12:10:29', '2017-09-12 12:10:29'),
	(19, 21, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryAbout', 2, '2017-09-12 12:10:29', '2017-09-12 12:10:29'),
	(20, 20, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryAbout', 3, '2017-09-12 12:10:29', '2017-09-12 12:10:29'),
	(21, 19, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryAbout', 4, '2017-09-12 12:10:29', '2017-09-12 12:10:29'),
	(22, 18, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryAbout', 5, '2017-09-12 12:10:29', '2017-09-12 12:10:29'),
	(23, 17, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryAbout', 6, '2017-09-12 12:10:29', '2017-09-12 12:10:29'),
	(24, 16, 1, 'Modules\\PageSets\\Entities\\Sets', 'HomeGalleryAbout', 7, '2017-09-12 12:10:29', '2017-09-12 12:10:29');
/*!40000 ALTER TABLE `media__imageables` ENABLE KEYS */;

-- Дамп структуры для таблица rero.menu__menuitems
DROP TABLE IF EXISTS `menu__menuitems`;
CREATE TABLE IF NOT EXISTS `menu__menuitems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `page_id` int(10) unsigned DEFAULT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `target` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'page',
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `module_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu__menuitems_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu__menuitems_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu__menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.menu__menuitems: ~0 rows (приблизительно)
DELETE FROM `menu__menuitems`;
/*!40000 ALTER TABLE `menu__menuitems` DISABLE KEYS */;
INSERT INTO `menu__menuitems` (`id`, `menu_id`, `page_id`, `position`, `target`, `link_type`, `class`, `module_name`, `parent_id`, `lft`, `rgt`, `depth`, `created_at`, `updated_at`, `is_root`, `icon`) VALUES
	(1, 1, NULL, 0, NULL, 'page', '', NULL, NULL, NULL, NULL, NULL, '2017-09-08 09:00:33', '2017-09-08 09:00:33', 1, NULL);
/*!40000 ALTER TABLE `menu__menuitems` ENABLE KEYS */;

-- Дамп структуры для таблица rero.menu__menuitem_translations
DROP TABLE IF EXISTS `menu__menuitem_translations`;
CREATE TABLE IF NOT EXISTS `menu__menuitem_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menuitem_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu__menuitem_translations_menuitem_id_locale_unique` (`menuitem_id`,`locale`),
  KEY `menu__menuitem_translations_locale_index` (`locale`),
  CONSTRAINT `menu__menuitem_translations_menuitem_id_foreign` FOREIGN KEY (`menuitem_id`) REFERENCES `menu__menuitems` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.menu__menuitem_translations: ~2 rows (приблизительно)
DELETE FROM `menu__menuitem_translations`;
/*!40000 ALTER TABLE `menu__menuitem_translations` DISABLE KEYS */;
INSERT INTO `menu__menuitem_translations` (`id`, `menuitem_id`, `locale`, `status`, `title`, `url`, `uri`, `created_at`, `updated_at`) VALUES
	(1, 1, 'en', 0, 'root', NULL, NULL, '2017-09-08 09:00:33', '2017-09-08 09:00:33'),
	(2, 1, 'ru', 0, 'root', NULL, NULL, '2017-09-08 09:00:33', '2017-09-08 09:00:33');
/*!40000 ALTER TABLE `menu__menuitem_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.menu__menus
DROP TABLE IF EXISTS `menu__menus`;
CREATE TABLE IF NOT EXISTS `menu__menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.menu__menus: ~0 rows (приблизительно)
DELETE FROM `menu__menus`;
/*!40000 ALTER TABLE `menu__menus` DISABLE KEYS */;
INSERT INTO `menu__menus` (`id`, `name`, `primary`, `created_at`, `updated_at`) VALUES
	(1, 'main_menu', 0, '2017-09-08 09:00:33', '2017-09-08 09:00:33');
/*!40000 ALTER TABLE `menu__menus` ENABLE KEYS */;

-- Дамп структуры для таблица rero.menu__menu_translations
DROP TABLE IF EXISTS `menu__menu_translations`;
CREATE TABLE IF NOT EXISTS `menu__menu_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu__menu_translations_menu_id_locale_unique` (`menu_id`,`locale`),
  KEY `menu__menu_translations_locale_index` (`locale`),
  CONSTRAINT `menu__menu_translations_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu__menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.menu__menu_translations: ~2 rows (приблизительно)
DELETE FROM `menu__menu_translations`;
/*!40000 ALTER TABLE `menu__menu_translations` DISABLE KEYS */;
INSERT INTO `menu__menu_translations` (`id`, `menu_id`, `locale`, `status`, `title`, `created_at`, `updated_at`) VALUES
	(1, 1, 'en', 1, 'Main menu', '2017-09-08 09:00:33', '2017-09-08 09:00:33'),
	(2, 1, 'ru', 1, 'Главное меню', '2017-09-08 09:00:33', '2017-09-08 09:00:33');
/*!40000 ALTER TABLE `menu__menu_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.migrations: ~49 rows (приблизительно)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(99, '2013_04_09_062329_create_revisions_table', 1),
	(100, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
	(101, '2014_09_27_170107_create_posts_table', 1),
	(102, '2014_09_27_175411_create_post_translations_table', 1),
	(103, '2014_09_27_175736_create_categories_table', 1),
	(104, '2014_09_27_175804_create_category_translations_table', 1),
	(105, '2014_09_27_180507_create_tags_table', 1),
	(106, '2014_09_27_180538_create_tag_translations_table', 1),
	(107, '2014_09_27_181907_create_post_tag_table', 1),
	(108, '2014_10_14_200250_create_settings_table', 1),
	(109, '2014_10_15_191204_create_setting_translations_table', 1),
	(110, '2014_10_26_162751_create_files_table', 1),
	(111, '2014_10_26_162811_create_file_translations_table', 1),
	(112, '2014_11_03_160015_create_menus_table', 1),
	(113, '2014_11_03_160138_create_menu-translations_table', 1),
	(114, '2014_11_03_160753_create_menuitems_table', 1),
	(115, '2014_11_03_160804_create_menuitem_translation_table', 1),
	(116, '2014_11_30_191858_create_pages_tables', 1),
	(117, '2014_12_17_185301_add_root_column_to_menus_table', 1),
	(118, '2015_02_27_105241_create_image_links_table', 1),
	(119, '2015_04_02_184200_create_widgets_table', 1),
	(120, '2015_05_29_180714_add_status_column_to_post_table', 1),
	(121, '2015_06_18_170048_make_settings_value_text_field', 1),
	(122, '2015_09_05_100142_add_icon_column_to_menuitems_table', 1),
	(123, '2015_10_22_130947_make_settings_name_unique', 1),
	(124, '2015_11_20_184604486385_create_translation_translations_table', 1),
	(125, '2015_11_20_184604743083_create_translation_translation_translations_table', 1),
	(126, '2015_12_01_094031_update_translation_translations_table_with_index', 1),
	(127, '2015_12_19_143643_add_sortable', 1),
	(128, '2016_01_26_102307_update_icon_column_on_menuitems_table', 1),
	(129, '2016_06_24_193447_create_user_tokens_table', 1),
	(130, '2016_07_12_181155032011_create_tag_tags_table', 1),
	(131, '2016_07_12_181155289444_create_tag_tag_translations_table', 1),
	(132, '2016_08_01_142345_add_link_type_colymn_to_menuitems_table', 1),
	(133, '2016_08_01_143130_add_class_column_to_menuitems_table', 1),
	(134, '2017_08_28_030930060957_create_dishes_dishes_table', 1),
	(135, '2017_08_28_030930325267_create_dishes_dish_translations_table', 1),
	(136, '2017_08_28_030930690460_create_dishes_dishcategories_table', 1),
	(137, '2017_08_28_030930943954_create_dishes_dishcategory_translations_table', 1),
	(138, '2017_08_31_092158618860_create_mainpage_mainpages_table', 1),
	(139, '2017_08_31_092158900541_create_mainpage_mainpage_translations_table', 1),
	(140, '2017_09_01_044303166285_create_feedbacks_feedback_table', 1),
	(141, '2017_09_03_063408451323_create_orders_orders_table', 1),
	(142, '2017_09_06_030930060957_create_mats_mats_table', 1),
	(143, '2017_09_06_030930325267_create_mats_mat_translations_table', 1),
	(144, '2017_09_06_030930690460_create_mats_matcategories_table', 1),
	(145, '2017_09_06_030930943954_create_mats_matcategory_translations_table', 1),
	(146, '2017_09_07_090914241451_create_pagesets_sets_table', 1),
	(147, '2017_09_07_090914501768_create_pagesets_sets_translations_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.orders__orders
DROP TABLE IF EXISTS `orders__orders`;
CREATE TABLE IF NOT EXISTS `orders__orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dish_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.orders__orders: ~0 rows (приблизительно)
DELETE FROM `orders__orders`;
/*!40000 ALTER TABLE `orders__orders` DISABLE KEYS */;
INSERT INTO `orders__orders` (`id`, `name`, `tel`, `count`, `dish_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, '-', '867867', '1', 2, 'inprocess', NULL, '2017-09-11 11:42:24');
/*!40000 ALTER TABLE `orders__orders` ENABLE KEYS */;

-- Дамп структуры для таблица rero.pagesets__sets
DROP TABLE IF EXISTS `pagesets__sets`;
CREATE TABLE IF NOT EXISTS `pagesets__sets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `home_menu_button_show` tinyint(4) NOT NULL DEFAULT '0',
  `home_dishes_categories_show` tinyint(4) NOT NULL DEFAULT '0',
  `home_dishes_menu_show` tinyint(4) NOT NULL DEFAULT '0',
  `home_dishes_show` tinyint(4) NOT NULL DEFAULT '0',
  `home_gallery_show` tinyint(4) NOT NULL DEFAULT '0',
  `home_feedbacks_show` tinyint(4) NOT NULL DEFAULT '0',
  `home_addition_content_show` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.pagesets__sets: ~1 rows (приблизительно)
DELETE FROM `pagesets__sets`;
/*!40000 ALTER TABLE `pagesets__sets` DISABLE KEYS */;
INSERT INTO `pagesets__sets` (`id`, `home_menu_button_show`, `home_dishes_categories_show`, `home_dishes_menu_show`, `home_dishes_show`, `home_gallery_show`, `home_feedbacks_show`, `home_addition_content_show`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 1, 1, 1, NULL, '2017-09-12 11:02:21');
/*!40000 ALTER TABLE `pagesets__sets` ENABLE KEYS */;

-- Дамп структуры для таблица rero.pagesets__sets_translations
DROP TABLE IF EXISTS `pagesets__sets_translations`;
CREATE TABLE IF NOT EXISTS `pagesets__sets_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `home_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `home_meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `home_add_content_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_add_content` text COLLATE utf8_unicode_ci NOT NULL,
  `news_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `news_meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `events_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `events_meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `collective_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collective_meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `collective_meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `gallery_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `gallery_meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `sets_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pagesets__sets_translations_sets_id_locale_unique` (`sets_id`,`locale`),
  KEY `pagesets__sets_translations_locale_index` (`locale`),
  CONSTRAINT `pagesets__sets_translations_sets_id_foreign` FOREIGN KEY (`sets_id`) REFERENCES `pagesets__sets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.pagesets__sets_translations: ~2 rows (приблизительно)
DELETE FROM `pagesets__sets_translations`;
/*!40000 ALTER TABLE `pagesets__sets_translations` DISABLE KEYS */;
INSERT INTO `pagesets__sets_translations` (`id`, `home_title`, `home_meta_keywords`, `home_meta_description`, `home_add_content_title`, `home_add_content`, `news_title`, `news_meta_keywords`, `news_meta_description`, `menu_title`, `menu_meta_keywords`, `menu_meta_description`, `events_title`, `events_meta_keywords`, `events_meta_description`, `collective_title`, `collective_meta_keywords`, `collective_meta_description`, `gallery_title`, `gallery_meta_keywords`, `gallery_meta_description`, `sets_id`, `locale`) VALUES
	(1, 'The "Rero" cafe', '<p>Cafe, rero, Peterburgh</p>\r\n', '<p>Come and enjoy</p>\r\n', 'Addition content title', '<p>Addition content full text</p>\r\n', 'News', '<p>News, Rero, Rero News, Rero cafe, Cafe, News cafe</p>\r\n', '<p>This page for news</p>\r\n', 'Menu', '<p>Menu, Cafe, Rero, Rero menu</p>\r\n', '<p>&quot;Rero&quot; our menu</p>\r\n', 'Events', '<p>Rero, Events, Events in Rero, Rero Cafe, Cafe Events</p>\r\n', '<p>Events in &quot;Rero&quot; cafe</p>\r\n', 'Our collective', '<p>Rero, Cafe, Collective, Collective in Rero</p>\r\n', '<p>Collective in Rero cafe</p>\r\n', 'Gallery', '<p>Gallery, Cafe, Rero cafe gallery</p>\r\n', '<p>Gallery in Rero cafe</p>\r\n', 1, 'en'),
	(2, 'Кафе "Рэро"', '<p>Кафе, Рэро, Спб</p>\r\n', '<p>Приходите и наслаждайтесь</p>\r\n', 'Заголовок доп контента', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nisl elit, tempus a leo eu, rutrum elementum nisl. Pellentesque ac posuere ante. Proin cursus arcu eget massa pretium, eget condimentum ex mattis. Sed finibus a eros vitae mollis. Suspendisse sit amet vulputate erat. Sed dignissim sollicitudin nisl et mollis. Maecenas convallis eros vitae felis pellentesque mollis. Phasellus pellentesque nunc tortor, non venenatis dolor suscipit at. Nunc non felis quis magna hendrerit volutpat. Donec finibus vulputate gravida.<img alt="" src="http://rero.dev/assets/media/zapechennoe-myaso-s-kartofelem-i-syrom_MatsCategoryOnMainThumb.jpg" style="float: right; width: 300px; height: 250px;" /></p>\r\n\r\n<p>Donec varius bibendum justo, sed faucibus diam posuere at. Vivamus convallis lorem at placerat consectetur. Suspendisse congue erat a justo sagittis, quis egestas nisl fringilla. Quisque quis sem a enim mollis molestie. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas quis ullamcorper nunc. Integer ut purus mattis, placerat neque eget, sagittis ante. Phasellus posuere vitae nisi id vulputate. Nullam quis erat quis ante egestas feugiat. Morbi a massa ultrices, elementum felis ac, pellentesque eros. Nam maximus eu justo sit amet finibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut feugiat lacinia ultrices.</p>\r\n\r\n<p>Maecenas id congue elit, ac egestas dui. Sed tristique eget augue ac lacinia. Phasellus eros metus, iaculis quis ullamcorper ac, consectetur fermentum justo. Maecenas tincidunt libero pellentesque lectus maximus blandit. Nulla facilisi. Sed tincidunt risus nulla, et consectetur lacus lacinia id. Nunc ut dapibus tellus, in mattis velit. In varius odio eget nunc auctor auctor. Cras euismod sem vitae enim condimentum, vitae scelerisque dolor ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi euismod urna ac cursus vestibulum.</p>\r\n\r\n<p><img alt="" src="http://rero.dev/assets/media/f7cb8b3e578430a7b0f1d25664d80b77_DishesCategoryOnMainThumb.jpg" style="float: left; width: 300px; height: 250px;" /></p>\r\n\r\n<p>Nunc mollis in magna in consequat. Nulla ornare posuere diam. Sed metus risus, semper sit amet nunc eu, egestas vulputate est. Quisque sodales feugiat purus, et consequat urna feugiat posuere. Maecenas a pretium sem. Phasellus aliquam blandit dictum. Vivamus euismod tincidunt condimentum. Nullam porttitor iaculis urna fermentum hendrerit. Vestibulum non aliquet mauris. Maecenas tempus neque eu nulla pellentesque ullamcorper. Nullam scelerisque dictum vehicula. Etiam vulputate nibh vel molestie vestibulum. Donec nec lacinia velit. Phasellus posuere euismod pretium.</p>\r\n\r\n<p>In hac habitasse platea dictumst. Vestibulum tincidunt ornare ipsum at cursus. Maecenas sit amet metus nulla. In sagittis semper metus, vitae porttitor turpis egestas a. Pellentesque ultrices quis urna eget vulputate. Praesent eget risus a nisi condimentum semper. Curabitur malesuada nibh nec risus mollis, sit amet feugiat justo commodo. Duis nec ipsum maximus, hendrerit est sed, eleifend felis. Suspendisse sollicitudin at ante a aliquet. Vivamus sed accumsan libero. Etiam mattis, velit sed posuere ullamcorper, turpis ex tincidunt felis, aliquet elementum nulla arcu in velit. Curabitur tristique, nunc in placerat facilisis, magna leo efficitur sem, at ullamcorper felis arcu non purus.</p>\r\n', 'Новости', '<p>Новости, Рэро, Новости кафе, кафе Рэро</p>\r\n', '<p>Страница новостей кафе &quot;Рэро&quot;</p>\r\n', 'Меню', '<p>Меню, Кафе, Кафе меню, Кафе Рэро меню, Рэро меню</p>\r\n', '<p>Кафе &quot;Рэро&quot; - меню</p>\r\n', 'Мероприятия', '<p>Мероприятия, Мероприятия в кафе Рэро, Рэро, Рэро акафе мероприятия</p>\r\n', '<p>Мероприятия в кафе &quot;Рэро&quot;</p>\r\n', 'Наш коллектив', '<p>Кафе Рэро, наш коллектив, Рэро коллектив, Рэро</p>\r\n', '<p>Кафе &quot;Рэро&quot; - наш коллектив</p>\r\n', 'Галерея', '<p>Гелерея, Рэро, Кафе, Кафе галерея</p>\r\n', '<p>Кафе Рэро - галерея</p>\r\n', 1, 'ru');
/*!40000 ALTER TABLE `pagesets__sets_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.page__pages
DROP TABLE IF EXISTS `page__pages`;
CREATE TABLE IF NOT EXISTS `page__pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_home` tinyint(1) NOT NULL DEFAULT '0',
  `template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.page__pages: ~0 rows (приблизительно)
DELETE FROM `page__pages`;
/*!40000 ALTER TABLE `page__pages` DISABLE KEYS */;
INSERT INTO `page__pages` (`id`, `is_home`, `template`, `created_at`, `updated_at`) VALUES
	(1, 1, 'home', '2017-09-07 10:24:16', '2017-09-07 10:24:16');
/*!40000 ALTER TABLE `page__pages` ENABLE KEYS */;

-- Дамп структуры для таблица rero.page__page_translations
DROP TABLE IF EXISTS `page__page_translations`;
CREATE TABLE IF NOT EXISTS `page__page_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page__page_translations_page_id_locale_unique` (`page_id`,`locale`),
  KEY `page__page_translations_locale_index` (`locale`),
  CONSTRAINT `page__page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `page__pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.page__page_translations: ~0 rows (приблизительно)
DELETE FROM `page__page_translations`;
/*!40000 ALTER TABLE `page__page_translations` DISABLE KEYS */;
INSERT INTO `page__page_translations` (`id`, `page_id`, `locale`, `title`, `slug`, `status`, `body`, `meta_title`, `meta_description`, `og_title`, `og_description`, `og_image`, `og_type`, `created_at`, `updated_at`) VALUES
	(1, 1, 'en', 'Home page', 'home', 1, '<p><strong>You made it!</strong></p>\n<p>You&#39;ve installed AsgardCMS and are ready to proceed to the <a href="/en/backend">administration area</a>.</p>\n<h2>What&#39;s next ?</h2>\n<p>Learn how you can develop modules for AsgardCMS by reading our <a href="https://github.com/AsgardCms/Documentation">documentation</a>.</p>\n', 'Home page', NULL, NULL, NULL, NULL, NULL, '2017-09-07 10:24:16', '2017-09-07 10:24:16');
/*!40000 ALTER TABLE `page__page_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.persistences
DROP TABLE IF EXISTS `persistences`;
CREATE TABLE IF NOT EXISTS `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.persistences: ~14 rows (приблизительно)
DELETE FROM `persistences`;
/*!40000 ALTER TABLE `persistences` DISABLE KEYS */;
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
	(1, 1, 'NxdRM6nBMdIdGu0DHfWtBnpFfdPFM0GV', '2017-09-07 10:26:03', '2017-09-07 10:26:03'),
	(2, 1, 'aQxhPG5LJH1sj4ZGkpACRREjklzg8yLk', '2017-09-08 08:52:23', '2017-09-08 08:52:23'),
	(3, 1, 'zUFqOVWhSzN4N7DE3kQ2tZ8J7VTzxqfe', '2017-09-08 08:52:27', '2017-09-08 08:52:27'),
	(4, 1, 'ssAch5Zm7szOzhnngaY3hNbzQ6mvGKNK', '2017-09-08 08:52:33', '2017-09-08 08:52:33'),
	(5, 1, '4YKokFJVmt3MTNODMQFwBOaWy87feUQx', '2017-09-08 08:52:39', '2017-09-08 08:52:39'),
	(6, 1, 'BjYfuseK6l7FaA6pnrGc5fuWMzQMvnW6', '2017-09-08 09:41:02', '2017-09-08 09:41:02'),
	(7, 1, 'PWUazfcKgF51dVwJT2PTmIVtM7x3rFey', '2017-09-08 09:41:04', '2017-09-08 09:41:04'),
	(8, 1, 'mSEc9QRlMx5NwsMT9tlhjL1XpvFgcsAR', '2017-09-08 09:41:08', '2017-09-08 09:41:08'),
	(9, 1, 'Zp3vRkxkjoe8CNC5MKv88iR0TnxaGmSm', '2017-09-08 09:41:13', '2017-09-08 09:41:13'),
	(10, 1, 'HOgOo7xePYLS6kGpDM93ZnrJDspdkHIc', '2017-09-08 09:41:18', '2017-09-08 09:41:18'),
	(11, 1, 'g0xtngzJercSX9BCvTMv5aXBVjftGE8g', '2017-09-08 09:41:27', '2017-09-08 09:41:27'),
	(12, 1, 'lmrpEGAB6km4VJNNm8TNSH3hlKdFWfFr', '2017-09-10 04:02:20', '2017-09-10 04:02:20'),
	(13, 1, '5r6eDDMeh7boI2gxcTgajgNlMUQTsAsT', '2017-09-10 04:02:32', '2017-09-10 04:02:32'),
	(14, 1, 'bh5hg5xohTUjc1PPVw0FvFILoDpABUiP', '2017-09-10 04:02:39', '2017-09-10 04:02:39'),
	(15, 1, 'V3ZsfQ8ZHtQwMxq6HTf6M46vGGLanwG0', '2017-09-12 11:40:38', '2017-09-12 11:40:38');
/*!40000 ALTER TABLE `persistences` ENABLE KEYS */;

-- Дамп структуры для таблица rero.reminders
DROP TABLE IF EXISTS `reminders`;
CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.reminders: ~0 rows (приблизительно)
DELETE FROM `reminders`;
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;

-- Дамп структуры для таблица rero.revisions
DROP TABLE IF EXISTS `revisions`;
CREATE TABLE IF NOT EXISTS `revisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `revisionable_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8_unicode_ci,
  `new_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.revisions: ~13 rows (приблизительно)
DELETE FROM `revisions`;
/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
INSERT INTO `revisions` (`id`, `revisionable_type`, `revisionable_id`, `user_id`, `key`, `old_value`, `new_value`, `created_at`, `updated_at`) VALUES
	(1, 'Modules\\Translation\\Entities\\TranslationTranslation', 1, 1, 'created_at', NULL, NULL, '2017-09-08 08:52:23', '2017-09-08 08:52:23'),
	(2, 'Modules\\Translation\\Entities\\TranslationTranslation', 2, 1, 'created_at', NULL, NULL, '2017-09-08 08:52:27', '2017-09-08 08:52:27'),
	(3, 'Modules\\Translation\\Entities\\TranslationTranslation', 3, 1, 'created_at', NULL, NULL, '2017-09-08 08:52:33', '2017-09-08 08:52:33'),
	(4, 'Modules\\Translation\\Entities\\TranslationTranslation', 4, 1, 'created_at', NULL, NULL, '2017-09-08 08:52:39', '2017-09-08 08:52:39'),
	(5, 'Modules\\Translation\\Entities\\TranslationTranslation', 5, 1, 'created_at', NULL, NULL, '2017-09-08 09:41:02', '2017-09-08 09:41:02'),
	(6, 'Modules\\Translation\\Entities\\TranslationTranslation', 6, 1, 'created_at', NULL, NULL, '2017-09-08 09:41:04', '2017-09-08 09:41:04'),
	(7, 'Modules\\Translation\\Entities\\TranslationTranslation', 7, 1, 'created_at', NULL, NULL, '2017-09-08 09:41:08', '2017-09-08 09:41:08'),
	(8, 'Modules\\Translation\\Entities\\TranslationTranslation', 8, 1, 'created_at', NULL, NULL, '2017-09-08 09:41:13', '2017-09-08 09:41:13'),
	(9, 'Modules\\Translation\\Entities\\TranslationTranslation', 9, 1, 'created_at', NULL, NULL, '2017-09-08 09:41:18', '2017-09-08 09:41:18'),
	(10, 'Modules\\Translation\\Entities\\TranslationTranslation', 10, 1, 'created_at', NULL, NULL, '2017-09-08 09:41:27', '2017-09-08 09:41:27'),
	(11, 'Modules\\Translation\\Entities\\TranslationTranslation', 11, 1, 'created_at', NULL, NULL, '2017-09-10 04:02:21', '2017-09-10 04:02:21'),
	(12, 'Modules\\Translation\\Entities\\TranslationTranslation', 11, 1, 'value', 'Меню', 'Блюда', '2017-09-10 04:02:32', '2017-09-10 04:02:32'),
	(13, 'Modules\\Translation\\Entities\\TranslationTranslation', 12, 1, 'created_at', NULL, NULL, '2017-09-10 04:02:39', '2017-09-10 04:02:39'),
	(14, 'Modules\\Translation\\Entities\\TranslationTranslation', 13, 1, 'created_at', NULL, NULL, '2017-09-12 11:40:39', '2017-09-12 11:40:39');
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;

-- Дамп структуры для таблица rero.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.roles: ~2 rows (приблизительно)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin', '{"blog.posts.index":true,"blog.posts.create":true,"blog.posts.edit":true,"blog.posts.destroy":true,"blog.categories.index":true,"blog.categories.create":true,"blog.categories.edit":true,"blog.categories.destroy":true,"blog.tags.index":true,"blog.tags.create":true,"blog.tags.edit":true,"blog.tags.destroy":true,"core.sidebar.group":true,"dashboard.index":true,"dashboard.update":true,"dashboard.reset":true,"dishes.dishes.index":true,"dishes.dishes.create":true,"dishes.dishes.edit":true,"dishes.dishes.destroy":true,"dishes.dishcategories.index":true,"dishes.dishcategories.create":true,"dishes.dishcategories.edit":true,"dishes.dishcategories.destroy":true,"feedbacks.feedback.index":true,"feedbacks.feedback.create":true,"feedbacks.feedback.edit":true,"feedbacks.feedback.destroy":true,"mainpage.mainpages.index":true,"mainpage.mainpages.create":true,"mainpage.mainpages.edit":true,"mainpage.mainpages.destroy":true,"mats.mats.index":true,"mats.mats.create":true,"mats.mats.edit":true,"mats.mats.destroy":true,"mats.matcategories.index":true,"mats.matcategories.create":true,"mats.matcategories.edit":true,"mats.matcategories.destroy":true,"media.medias.index":true,"media.medias.create":true,"media.medias.edit":true,"media.medias.destroy":true,"menu.menus.index":true,"menu.menus.create":true,"menu.menus.edit":true,"menu.menus.destroy":true,"menu.menuitems.index":true,"menu.menuitems.create":true,"menu.menuitems.edit":true,"menu.menuitems.destroy":true,"orders.orders.index":true,"orders.orders.create":true,"orders.orders.edit":true,"orders.orders.destroy":true,"page.pages.index":true,"page.pages.create":true,"page.pages.edit":true,"page.pages.destroy":true,"pagesets.sets.index":true,"pagesets.sets.create":true,"pagesets.sets.edit":true,"pagesets.sets.destroy":true,"setting.settings.index":true,"setting.settings.edit":true,"tag.tags.index":true,"tag.tags.create":true,"tag.tags.edit":true,"tag.tags.destroy":true,"translation.translations.index":true,"translation.translations.edit":true,"translation.translations.import":true,"translation.translations.export":true,"user.users.index":true,"user.users.create":true,"user.users.edit":true,"user.users.destroy":true,"user.roles.index":true,"user.roles.create":true,"user.roles.edit":true,"user.roles.destroy":true,"account.api-keys.index":true,"account.api-keys.create":true,"account.api-keys.destroy":true,"workshop.sidebar.group":true,"workshop.modules.index":true,"workshop.modules.show":true,"workshop.modules.update":true,"workshop.modules.disable":true,"workshop.modules.enable":true,"workshop.modules.publish":true,"workshop.themes.index":true,"workshop.themes.show":true,"workshop.themes.publish":true}', '2017-09-07 10:24:03', '2017-09-07 10:42:06'),
	(2, 'user', 'User', NULL, '2017-09-07 10:24:03', '2017-09-07 10:24:03');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Дамп структуры для таблица rero.role_users
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.role_users: ~0 rows (приблизительно)
DELETE FROM `role_users`;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2017-09-07 10:24:16', '2017-09-07 10:24:16');
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;

-- Дамп структуры для таблица rero.setting__settings
DROP TABLE IF EXISTS `setting__settings`;
CREATE TABLE IF NOT EXISTS `setting__settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plainValue` text COLLATE utf8_unicode_ci,
  `isTranslatable` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting__settings_name_unique` (`name`),
  KEY `setting__settings_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.setting__settings: ~6 rows (приблизительно)
DELETE FROM `setting__settings`;
/*!40000 ALTER TABLE `setting__settings` DISABLE KEYS */;
INSERT INTO `setting__settings` (`id`, `name`, `plainValue`, `isTranslatable`, `created_at`, `updated_at`) VALUES
	(1, 'core::template', 'Flatly', 0, '2017-09-07 10:24:16', '2017-09-07 10:24:16'),
	(2, 'core::locales', '["en","ru"]', 0, '2017-09-07 10:24:16', '2017-09-08 08:17:34'),
	(3, 'core::site-name', NULL, 1, '2017-09-08 08:17:34', '2017-09-08 08:17:34'),
	(4, 'core::site-name-mini', NULL, 1, '2017-09-08 08:17:34', '2017-09-08 08:17:34'),
	(5, 'core::site-description', NULL, 1, '2017-09-08 08:17:34', '2017-09-08 08:17:34'),
	(6, 'core::analytics-script', '', 0, '2017-09-08 08:17:34', '2017-09-08 08:17:34');
/*!40000 ALTER TABLE `setting__settings` ENABLE KEYS */;

-- Дамп структуры для таблица rero.setting__setting_translations
DROP TABLE IF EXISTS `setting__setting_translations`;
CREATE TABLE IF NOT EXISTS `setting__setting_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting__setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  KEY `setting__setting_translations_locale_index` (`locale`),
  CONSTRAINT `setting__setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `setting__settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.setting__setting_translations: ~2 rows (приблизительно)
DELETE FROM `setting__setting_translations`;
/*!40000 ALTER TABLE `setting__setting_translations` DISABLE KEYS */;
INSERT INTO `setting__setting_translations` (`id`, `setting_id`, `locale`, `value`, `description`) VALUES
	(1, 3, 'en', '', NULL),
	(2, 4, 'en', '', NULL),
	(3, 5, 'en', '', NULL);
/*!40000 ALTER TABLE `setting__setting_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.tag__tagged
DROP TABLE IF EXISTS `tag__tagged`;
CREATE TABLE IF NOT EXISTS `tag__tagged` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `taggable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taggable_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag__tagged_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.tag__tagged: ~0 rows (приблизительно)
DELETE FROM `tag__tagged`;
/*!40000 ALTER TABLE `tag__tagged` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag__tagged` ENABLE KEYS */;

-- Дамп структуры для таблица rero.tag__tags
DROP TABLE IF EXISTS `tag__tags`;
CREATE TABLE IF NOT EXISTS `tag__tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namespace` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.tag__tags: ~0 rows (приблизительно)
DELETE FROM `tag__tags`;
/*!40000 ALTER TABLE `tag__tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag__tags` ENABLE KEYS */;

-- Дамп структуры для таблица rero.tag__tag_translations
DROP TABLE IF EXISTS `tag__tag_translations`;
CREATE TABLE IF NOT EXISTS `tag__tag_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag__tag_translations_tag_id_locale_unique` (`tag_id`,`locale`),
  KEY `tag__tag_translations_locale_index` (`locale`),
  CONSTRAINT `tag__tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tag__tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.tag__tag_translations: ~0 rows (приблизительно)
DELETE FROM `tag__tag_translations`;
/*!40000 ALTER TABLE `tag__tag_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag__tag_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.throttle
DROP TABLE IF EXISTS `throttle`;
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.throttle: ~0 rows (приблизительно)
DELETE FROM `throttle`;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;

-- Дамп структуры для таблица rero.translation__translations
DROP TABLE IF EXISTS `translation__translations`;
CREATE TABLE IF NOT EXISTS `translation__translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `translation__translations_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.translation__translations: ~10 rows (приблизительно)
DELETE FROM `translation__translations`;
/*!40000 ALTER TABLE `translation__translations` DISABLE KEYS */;
INSERT INTO `translation__translations` (`id`, `key`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'mats::matcategories.parents.parent_0', '2017-09-08 08:52:23', '2017-09-08 08:52:23', NULL),
	(2, 'mats::matcategories.parents.parent_1', '2017-09-08 08:52:27', '2017-09-08 08:52:27', NULL),
	(3, 'mats::matcategories.parents.parent_2', '2017-09-08 08:52:33', '2017-09-08 08:52:33', NULL),
	(4, 'mats::matcategories.parents.parent_3', '2017-09-08 08:52:39', '2017-09-08 08:52:39', NULL),
	(5, 'feedbacks::feedback.button.create feedback', '2017-09-08 09:41:02', '2017-09-08 09:41:02', NULL),
	(6, 'feedbacks::feedback.create resource', '2017-09-08 09:41:04', '2017-09-08 09:41:04', NULL),
	(7, 'feedbacks::feedback.destroy resource', '2017-09-08 09:41:08', '2017-09-08 09:41:08', NULL),
	(8, 'feedbacks::feedback.edit resource', '2017-09-08 09:41:13', '2017-09-08 09:41:13', NULL),
	(9, 'feedbacks::feedback.list resource', '2017-09-08 09:41:18', '2017-09-08 09:41:18', NULL),
	(10, 'feedbacks::feedback.title.create feedback', '2017-09-08 09:41:27', '2017-09-08 09:41:27', NULL),
	(11, 'dishes::dishes.title.dishes', '2017-09-10 04:02:21', '2017-09-10 04:02:21', NULL),
	(12, 'translation::translations.frontend.mainpage.show_menu_string', '2017-09-12 11:40:39', '2017-09-12 11:40:39', NULL);
/*!40000 ALTER TABLE `translation__translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.translation__translation_translations
DROP TABLE IF EXISTS `translation__translation_translations`;
CREATE TABLE IF NOT EXISTS `translation__translation_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `translation_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_trans_id_locale_unique` (`translation_id`,`locale`),
  KEY `translation__translation_translations_locale_index` (`locale`),
  CONSTRAINT `translation__translation_translations_translation_id_foreign` FOREIGN KEY (`translation_id`) REFERENCES `translation__translations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.translation__translation_translations: ~9 rows (приблизительно)
DELETE FROM `translation__translation_translations`;
/*!40000 ALTER TABLE `translation__translation_translations` DISABLE KEYS */;
INSERT INTO `translation__translation_translations` (`id`, `value`, `translation_id`, `locale`) VALUES
	(1, 'Не выбрано', 1, 'ru'),
	(2, 'Новости', 2, 'ru'),
	(3, 'Мероприятия', 3, 'ru'),
	(4, 'Наш коллектив', 4, 'ru'),
	(5, 'Создать отзыв', 5, 'ru'),
	(6, 'Создать отзыв', 6, 'ru'),
	(7, 'Удалить отзыв', 7, 'ru'),
	(8, 'Редактировать отзыв', 8, 'ru'),
	(9, 'Список отзывов', 9, 'ru'),
	(10, 'Создать отзыв', 10, 'ru'),
	(11, 'Блюда', 11, 'ru'),
	(12, 'Dishes', 11, 'en'),
	(13, 'Перейти к странице меню', 12, 'ru');
/*!40000 ALTER TABLE `translation__translation_translations` ENABLE KEYS */;

-- Дамп структуры для таблица rero.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.users: ~0 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
	(1, 'rinzler91@mail.ru', '$2y$10$tdQMsV0o9nkvj0K6yA0ia.8cFVysVp/DaDi2cZgg8/P8tmE1bZED.', NULL, '2017-09-12 11:40:38', 'Devid', 'Wang', '2017-09-07 10:24:16', '2017-09-12 11:40:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для таблица rero.user_tokens
DROP TABLE IF EXISTS `user_tokens`;
CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_tokens_access_token_unique` (`access_token`),
  KEY `user_tokens_user_id_foreign` (`user_id`),
  CONSTRAINT `user_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы rero.user_tokens: ~0 rows (приблизительно)
DELETE FROM `user_tokens`;
/*!40000 ALTER TABLE `user_tokens` DISABLE KEYS */;
INSERT INTO `user_tokens` (`id`, `user_id`, `access_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'e2e8dfbf-1382-4cf2-8669-84f66753e5c1', '2017-09-07 10:24:16', '2017-09-07 10:24:16');
/*!40000 ALTER TABLE `user_tokens` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
