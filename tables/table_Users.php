<?php

/* 

create table `User` (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
username VARCHAR( 255 ) ,
hashedPassword VARCHAR( 255 ) ,
email VARCHAR( 255 ) UNIQUE ,
information VARCHAR( 255 )
)
 
create table `Tweet` (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
userId int ,
text VARCHAR( 255 ) ,
creationDate datetime,
foreign key(userId) references User(id)

)
 * 
 * CREATE TABLE IF NOT EXISTS `Messages` (
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `creationDate` datetime NOT NULL,
  `recipientUserId` int(11) NOT NULL,
  `senderUserId` int(11) NOT NULL, 
 `text` text,
  `isRead` tinyint(1) DEFAULT NULL,

 
  PRIMARY KEY (`messageId`),
  KEY `recipientUserId` (`recipientUserId`),
  KEY `senderUserId` (`senderUserId`),
    FOREIGN KEY (`senderUserId`) REFERENCES `User` (`id`),
    FOREIGN KEY (`recipientUserId`) REFERENCES `User` (`id`) ON DELETE CASCADE
)  DEFAULT CHARSET=utf8

 */

