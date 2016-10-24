<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>edit</title>
    </head>
    <body>
        
<?php
error_reporting(-1);

require_once 'src/connection.php';
require_once 'src/Tweet.php';

$loadedTweetsByUserId = Tweet::loadAllTweetsByUserId($conn, 12);


//var_dump($loadedTweets);
echo '<br>';
echo'<table border = 1>';
echo '<tr><th>Id tweeta</th><th>Id uzytkownika</th><th>uzytkownik</th><th>text</th><th>data</th></tr>';
foreach ($loadedTweetsByUserId as $tweet) {
    echo '<tr>';
    echo '<td>' . $tweet->getId() . '</td>';
    echo '<td>' . $tweet->getUserId() . '</td>';
    echo '<td><a href=UserTweets.php?userId=' . $tweet->getUserId() . '>' . $tweet->getUsername() . '</a></td>';
    echo '<td>' . $tweet->getText() . '</td>';
    echo '<td>' . $tweet->getCreationDate() . '</td>';
    echo '</tr>';
}
echo'</table>';
?>
</body>
</html>
