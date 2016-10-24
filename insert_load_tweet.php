<?php

error_reporting(-1);

require_once 'src/connection.php';
require_once 'src/Tweet.php';
/*
  $tweet = new Tweet();
  $tweet->setUserId('2');
  $tweet->setText('khjk  iudfghjhgfdfghjhgfdfghju');
  $tweet->setCreationDate('2016-04-01 15:45:00');
  $tweet->saveToDB($conn);
*/

$loadedTweets = Tweet::loadAllTweets($conn);
//var_dump($loadedTweets);
echo'sprawdzenie loadAllTweets';
echo '<br>';
echo'<table border = 1>';
echo '<tr><th>Id tweeta</th><th>uzytkownik</th><th>text</th><th>data</th></tr>';
foreach ($loadedTweets as $tweet) {
    echo '<tr>';
    echo '<td>' . $tweet->getId() . '</td>';
    echo '<td>' . $tweet->getUsername() . '</td>';
    echo '<td>' . $tweet->getText() . '</td>';
    echo '<td>' . $tweet->getCreationDate() . '</td>';
    echo '</tr>';
}
echo'</table>';
echo '<br>';



echo'sprawdzenie loadTweetById';
echo '<br>';
$loadedTweet = Tweet::loadTweetById($conn, 1);
echo 'id uzytkownika: ' . $loadedTweet->getUserId();
echo '<br>';

echo 'nazwa uzytkownika: ' . $loadedTweet->getUsername();
echo '<br>';

echo 'id tweeta: ' . $loadedTweet->getId();
echo '<br>';

echo 'tresc: ' . $loadedTweet->getText();
echo '<br>';

echo 'data: ' . $loadedTweet->getCreationDate();
echo '<br>';


echo '<br>';
echo'sprawdzenie loadAllTweetsByUserId';
$loadedTweetsByUserId = Tweet::loadAllTweetsByUserId($conn, 12);
//var_dump($loadedTweets);
echo '<br>';
echo'<table border = 1>';
echo '<tr><th>Id tweeta</th><th>id uzytkownika</th><th>text</th><th>data</th></tr>';
foreach ($loadedTweetsByUserId as $tweet) {
    echo '<tr>';
    echo '<td>' . $tweet->getId() . '</td>';
    echo '<td>' . $tweet->getUserId() . '</td>';
    echo '<td>' . $tweet->getText() . '</td>';
    echo '<td>' . $tweet->getCreationDate() . '</td>';
    echo '</tr>';
}
echo'</table>';




