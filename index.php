<?php
session_start();
if (!isset($_SESSION['loggedUserId'])) {
    header('Location: login.php');
}
?>

<html>
    <head></head>
    <body>
        Witamy na twitterze! 
        <?php
        if (isset($_SESSION['loggedUserId'])) {
            echo '<br>';
            echo '<a href="logout.php">wyloguj sie</a>';
        }
        ?>

    </body>

</html>

<?php
error_reporting(-1);

require_once 'src/connection.php';
require_once 'src/Tweet.php';


$loadedTweets = Tweet::loadAllTweets($conn);


echo'<table border = 1>';
echo '<tr><th>Id tweeta</th><th>uzytkownik</th><th>tweet</th><th>data</th></tr>';
foreach ($loadedTweets as $tweet) {
    echo '<tr>';
    echo '<td>' . $tweet->getId() . '</td>';
    echo '<td>' . $tweet->getUserId() . '</td>';
    echo '<td>' . $tweet->getText() . '</td>';
    echo '<td>' . $tweet->getCreationDate() . '</td>';
    echo '</tr>';
}
echo'</table>';
?>
