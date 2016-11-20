<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>edit</title>
    </head>
    <body>

        <?php
        session_start();
        error_reporting(-1);

        require_once 'src/connection.php';
        require_once 'src/Tweet.php';
        require_once 'src/User.php';
        require_once 'src/Messages.php';


        //$activeUser = User::loadUserById($conn, $_GET['loggedUserId']);  
        $activeUser = User::loadUserById($conn, $_SESSION['loggedUserId']);
        echo 'Witaj <b>' . $activeUser->getUsername() . ' </b>tu mozesz edytowac swoj profil';
        echo '<br>';
        echo '<br>';
        echo '<b>'. $activeUser->getUsername() .'</b> <a href="logout.php">wyloguj sie</a>';
        echo '<br>';
        echo '<a href="index.php">strona glowna</a>';
        echo '<br>';
        echo '<a href=UserMessages.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoje wiadomosci</a>';
        echo '<br>';
        echo '<b>' . $activeUser->getUsername() . '</b> tu sa twoje tweety:';
        //$loadedTweetsByUserId = Tweet::loadAllTweetsByUserId($conn, $_GET['loggedUserId']);
        $loadedTweetsByUserId = Tweet::loadAllTweetsByUserId($conn, $_SESSION['loggedUserId']);


        
        echo'<table border = 1>';
        echo '<tr><th>Id tweeta</th><th>Id uzytkownika</th><th>uzytkownik</th><th>text</th><th>data</th><th>komentarze</th></tr>';
        foreach ($loadedTweetsByUserId as $tweet) {
            echo '<tr>';
            echo '<td>' . $tweet->getId() . '</td>';
            echo '<td>' . $tweet->getUserId() . '</td>';
            echo '<td><a href=UserTweets.php?userId=' . $tweet->getUserId() . '>' . $tweet->getUsername() . '</a></td>';
            echo '<td>' . $tweet->getText() . '</td>';
            echo '<td>' . $tweet->getCreationDate() . '</td>';
            echo '<td><a href=Comments.php?tweetId=' . $tweet->getId() . '>' . '>>>>'. '<a\></td>';
            echo '</tr>';
        }
        echo'</table>';
        ?>
    </body>
</html>
