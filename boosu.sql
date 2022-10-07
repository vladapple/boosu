CREATE DATABASE `boosu`;

use `boosu`;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `attempt` int DEFAULT 0,
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT 'enabled',
   UNIQUE (`email`),
   constraint `pk_users` primary key (`id` asc)
)
;

INSERT INTO `users` (`name`, `email`, `password`, `pass`) VALUES
    ('pargol poshtareh', 'pargol.poshtareh@johnabbott.qc.ca', '1234567', '1234567'),
    ('basith', 'basith.qc@gmail.com', '1234567', '1234567'),
    ('myrzagul aidaralieva', 'myrzagul.aidaralieva@johnabbottcollege.net', '1234567', '1234567'),
    ('alina gotcherian', 'alina.gotcherian@johnabbottcollege.net', '1234567', '1234567'),
    ('liutsiia kateriushina', 'liutsiia.kateriushina@johnabbottcollege.net', '1234567', '1234567'),
    ('xin shi', 'xin.shi@johnabbottcollege.net', '1234567', '1234567'),
    ('dmitry kizyakov', 'dmitry.kizyakov@johnabbottcollege.net', '1234567', '1234567'),
    ('caelan seto', 'caelan.seto@johnabbottcollege.net', '1234567', '1234567'),
    ('mitchell fridman', 'mitchell.fridman@johnabbottcollege.net', '1234567', '1234567'),
    ('oxana tanschi', 'oxana.tanschi@johnabbottcollege.net', '1234567', '1234567'),
    ('edgar townsend', 'edgar.townsend@johnabbottcollege.net', '1234567', '1234567'),
    ('louis dumas-veronneau', 'louis.dumas-veronneau@johnabbottcollege.net', '1234567', '1234567'),
    ('gregory barre', 'gregory.barre@johnabbottcollege.net', '1234567', '1234567'),
    ('ngan nguyen', 'ngan.nguyen@johnabbottcollege.net', '1234567', '1234567'),
    ('ze wu', 'ze.wu@johnabbottcollege.net', '1234567', '1234567'),
    ('ali nehme', 'ali.nehme@johnabbottcollege.net', '1234567', '1234567'),
    ('yimin chen', 'yimin.chen@johnabbottcollege.net', '1234567', '1234567'),
    ('matthew rao', 'matthew.rao@johnabbottcollege.net', '1234567', '1234567'),
    ('ebin eldho', 'ebin.eldho@johnabbottcollege.net', '1234567', '1234567'),
    ('Vladislav Epelboym', 'Vladislav.Epelboym@johnabbottcollege.net', '1234567', '1234567'),
    ('Anton Diachenko', 'Anton.Diachenko@johnabbottcollege.net', '1234567', '1234567'),
    ('Kyle Piche', 'Kyle.Piche@johnabbottcollege.net', '1234567', '1234567'),
    ('Rami Chaouki', 'Rami.Chaouki@johnabbottcollege.net', '1234567', '1234567'),
    ('Alexander Holowach', 'Alexander.Holowach@johnabbottcollege.net', '1234567', '1234567'),
    ('Hossein Parsa', 'Hossein.Parsa@johnabbottcollege.net', '1234567', '1234567'),
    ('Kristy-Anne Hoffman', 'Kristy-Anne.Hoffman@johnabbottcollege.net', '1234567', '1234567'),
    ('Ilnaz Ghannad', 'Ilnaz.Ghannad@johnabbottcollege.net', '1234567', '1234567'),
    ('Amirsadegh Sharifi', 'Amirsadegh.Sharifi@johnabbottcollege.net', '1234567', '1234567'),
    ('Jia Luo', 'Jia.Luo@johnabbottcollege.net', '1234567', '1234567')
;

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `isbn` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `synopsis` TINYTEXT NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT 'available',
   constraint `pk_books` primary key (`isbn` asc)
)
;

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   UNIQUE (`email`),
   constraint `pk_admins` primary key (`id` asc)
)
;

INSERT INTO `admins` (`email`, `password`) VALUES
('vlad@gmail.com', '7777777'
)
;

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isbn` int NOT NULL,
  `user_id` int NOT NULL,
  `message` TINYTEXT NOT NULL,
  `rate` int,
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   constraint `pk_reviews` primary key (`id` asc)
)
;

alter table `reviews`
	add constraint `fk_reviews_books` foreign key (`isbn`)
		references `books` (`isbn`)
;

alter table `reviews`
	add constraint `fk_reviews_users` foreign key (`user_id`)
		references `users` (`id`)
;


DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isbn` int NOT NULL,
  `user_id` int NOT NULL,
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT 'unpaid',
   constraint `pk_cart` primary key (`id` asc)
)
;

alter table `cart`
	add constraint `fk_cart_books` foreign key (`isbn`)
		references `books` (`isbn`)
;

alter table `cart`
	add constraint `fk_cart_users` foreign key (`user_id`)
		references `users` (`id`)
;

DROP TABLE IF EXISTS `cartpaid`;

CREATE TABLE `cartpaid` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isbn` int NOT NULL,
  `user_id` int NOT NULL,
  `paid_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT 'paid',
   constraint `pk_cartpaid` primary key (`id` asc)
)
;

alter table `cartpaid`
	add constraint `fk_cartpaid_books` foreign key (`isbn`)
		references `books` (`isbn`)
;

alter table `cartpaid`
	add constraint `fk_cartpaid_users` foreign key (`user_id`)
		references `users` (`id`)
;

DROP TABLE IF EXISTS `favorites`;

CREATE TABLE `favorites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isbn` int NOT NULL,
  `user_id` int NOT NULL,
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   constraint `pk_favorites` primary key (`id` asc)
)
;

alter table `favorites`
	add constraint `fk_favorites_books` foreign key (`isbn`)
		references `books` (`isbn`)
;

alter table `favorites`
	add constraint `fk_favorites_users` foreign key (`user_id`)
		references `users` (`id`)
;