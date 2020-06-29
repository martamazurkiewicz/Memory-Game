CREATE DATABASE memoryGame;
ALTER DATABASE memoryGame DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE memoryGame;

DROP TABLE IF EXISTS users;

CREATE TABLE users(
id INT NOT NULL AUTO_INCREMENT,
userName VARCHAR(30) NOT NULL UNIQUE,
hash VARCHAR(64) NOT NULL,
highestScore INT NOT NULL,
PRIMARY KEY(id));

