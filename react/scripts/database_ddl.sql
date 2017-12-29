CREATE DATABASE `bookings` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE bookings;

CREATE TABLE `manager` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `roles` tinyblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1
;

CREATE TABLE `booking` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `booking_date` datetime DEFAULT NULL,
  `booking_number` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `day_departure` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `flug` float DEFAULT NULL,
  `hotel` float DEFAULT NULL,
  `kreuzfahrt` float DEFAULT NULL,
  `month_departure` int(11) DEFAULT NULL,
  `storno` int(11) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `versicherung` float DEFAULT NULL,
  `version` bigint(20) DEFAULT NULL,
  `year_departure` int(11) DEFAULT NULL,
  `manager_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKtieubmmea3tjdmg6m0pk6lomv` (`manager_id`),
  CONSTRAINT `FKtieubmmea3tjdmg6m0pk6lomv` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1
;

CREATE TABLE `percentages` (
  `kreuzfahrt_percent` float DEFAULT NULL,
  `flug_percent` float DEFAULT NULL,
  `hotel_percent` float DEFAULT NULL,
  `versicherung_percent` float DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

GRANT ALL on bookings_test.* to 'julia'@'localhost' ;

