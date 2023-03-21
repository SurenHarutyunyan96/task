SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `leads`;
CREATE TABLE `leads` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `ip_address` varchar(255) DEFAULT NULL,
                         `user_agent` varchar(255) DEFAULT NULL,
                         `view_date` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                         `page_url` varchar(255) NOT NULL,
                         `views_count` int(11) NOT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;