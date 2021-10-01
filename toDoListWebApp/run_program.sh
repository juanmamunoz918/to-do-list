#!/bin/bash
echo -e "\e[1;32mConfigurating database...\e[0m"
mysql -u$1 -p$2  -e "CREATE  USER IF NOT EXISTS tdl IDENTIFIED BY 'Tdl918';"
mysql -u$1 -p$2-e "GRANT ALL PRIVILEGES ON * . * TO 'tdl';"
mysql -u$1 -p$2 -e "FLUSH PRIVILEGES;"
mysql -utdl -pTdl918 -e "CREATE SCHEMA IF NOT EXISTS `toDoList` DEFAULT CHARACTER SET utf8 ;"
mysql -utdl -pTdl918 -e "USE `toDoList` ;"
mysql -utdl -pTdl918 -e "CREATE TABLE IF NOT EXISTS `toDoList`.`users` (`id` INT(11) NOT NULL AUTO_INCREMENT,`username` VARCHAR(60) NULL UNIQUE,`password` CHAR(60) NULL,PRIMARY KEY (`id`)) ENGINE = InnoDB;"
mysql -utdl -pTdl918 -e "CREATE TABLE IF NOT EXISTS `toDoList`.`folders` (`id` INT(11) NOT NULL AUTO_INCREMENT,`name` VARCHAR(45) NULL,PRIMARY KEY (`id`))ENGINE = InnoDB;"
mysql -utdl -pTdl918 -e "CREATE TABLE IF NOT EXISTS `toDoList`.`activities` (`id` INT(11) NOT NULL AUTO_INCREMENT,`name` VARCHAR(100) NULL, `status` BOOLEAN NULL, `idFolder` INT(11) NULL, PRIMARY KEY (`id`), INDEX `idFolder_idx` (`idFolder` ASC), CONSTRAINT `idFolder` FOREIGN KEY (`idFolder`)REFERENCES `toDoList`.`folders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION) ENGINE = InnoDB;"
mysql -utdl -pTdl918 -e "INSERT IGNORE INTO `toDoList`.`users` (`username`, `password`) VALUES ('admin@admin.com', '$2y$10$C6UzzmQhH8Tby.smsZKDyecxFp7RS0naokf0b0MtXTTPnV9RF1fZe');"
echo -e "\e[1;32mDatabase configured\e[0m"
echo -e "\e[1;32mOpening web on browser\e[0m"
cd ./public
open http://localhost:3300
echo -e "\e[1;32mStarting local server\e[0m"
php -S localhost:3300

