CREATE DATABASE `litotes`;
USE `litotes`;

CREATE TABLE `notes` (
  `id` varchar(10) NOT NULL,
  `note` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

INSERT INTO `notes` (`id`, `note`) VALUES
('test',	'test');