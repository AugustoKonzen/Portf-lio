CREATE DATABASE `sistema_login` DEFAULT CHARACTER SET utf8 ;
CREATE TABLE `sistema_login`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`));