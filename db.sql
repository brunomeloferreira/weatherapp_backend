SET @@global.time_zone = '+00:00';

CREATE DATABASE weatherapp COLLATE utf8_general_ci;

USE weatherapp;

CREATE TABLE weather (
    Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    TimeStamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Name varchar(255) NOT NULL UNIQUE,
    Region varchar(255),
    Country varchar(255),
    Temp varchar(255),
    WindSpeed varchar(255),
    Humidity varchar(255),
    Text varchar(255),
    Icon varchar(255)
);