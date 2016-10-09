<?php

/* 

create table `Users` (
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
creationDate date,
foreign key(userId) references User(id)

)

 */

