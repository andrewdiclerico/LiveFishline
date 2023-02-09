CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` nvarchar(50) NOT NULL,
  `email` nvarchar(50) NOT NULL,
  `password` nvarchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `name` VARCHAR(45) DEFAULT NULL ,
  `userphoto` VARCHAR(255) DEFAULT NULL,
  `state` VARCHAR(5) DEFAULT NULL,
  `bio` VARCHAR(500) DEFAULT NULL,
 PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `addfish` (
`fishID` int(11) NOT NULL AUTO_INCREMENT,
`username` nvarchar(50) NOT NULL,
`species` nvarchar(20) NOT NULL,
`fishlength` float NOT NULL,
`fishweight` float NOT NULL,
`locations` nvarchar(50) NOT NULL,
`released` nvarchar(5) NOT NULL,
`notes` nvarchar(1000) NOT NULL,
`images` nvarchar(255) NOT NULL,
PRIMARY KEY (`fishID`)
);

CREATE TABLE IF NOT EXISTS `adminusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` nvarchar(50) NOT NULL,
  `password` nvarchar(50) NOT NULL,
  `salt` nvarchar(50) NOT NULL,
 PRIMARY KEY (`id`)
);

INSERT INTO `capstone2022`.`adminusers` (`id`, `user`, `password`, `salt`) VALUES ('', 'bebe', 'lol', 'lol');

ALTER TABLE `capstone2022`.`addfish` 
ADD COLUMN `id` INT NULL AFTER `images`;



