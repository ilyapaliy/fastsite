#start working with MySQL under login: root; password: root;
#creating new database

CREATE TABLE `fast_site`.`users` ( `ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `password` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , PRIMARY KEY (`ID`), UNIQUE (`name`)) ENGINE = MyISAM CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `fast_site`.`articles` ( `ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `text` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`ID`)) ENGINE = MyISAM;

CREATE TABLE `fast_site`.`photo` ( `ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `path` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`ID`)) ENGINE = MyISAM CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `fast_site`.`video` ( `ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `path` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`ID`)) ENGINE = MyISAM CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `fast_site`.`audio` ( `ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `path` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`ID`)) ENGINE = MyISAM CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

#database is created!

INSERT INTO `users` (`ID`, `name`, `password`) VALUES ('1', 'admin', 'admin')

#admin was added with ID=1

ALTER TABLE `users` CHANGE `password` `password` VARCHAR(72) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;

#trying to do all articels interface
#INSERT INTO `articles` (`ID`, `name`, `text`, `time`) VALUES (NULL, 'title', 'text', CURRENT_TIMESTAMP);
#DELETE FROM `users` WHERE `users`.`ID` = 1

INSERT INTO `photo` (`ID`, `name`, `path`, `time`) VALUES (NULL, 'age', 'photo/IMG_20190521_083334.jpg', CURRENT_TIMESTAMP);

UPDATE `photo` SET `path` = 'IMG_20190521_083334.jpg' WHERE `photo`.`ID` = 1;

ALTER TABLE `photo` CHANGE `path` `type` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;

ALTER TABLE `photo` DROP `type`;

ALTER TABLE `photo` ADD `type` TEXT NOT NULL AFTER `name`;
