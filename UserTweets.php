<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>UserTweets</title>
    </head>
    <body>

        <?php
        error_reporting(-1);

        require_once 'src/connection.php';
        require_once 'src/Tweet.php';
        require_once 'src/User.php';


        $loadedUser = User::loadUserById($conn, $_GET['userId']);
        echo '<br>';
        echo 'Wtam, jestem ' . $loadedUser->getUsername() . '!<br>';
        echo '<br>';
        echo 'Ponizej kilka slow o mnie:<br> ' . $loadedUser->getInformation() . '!<br>';


        echo '<br>';
        echo 'A to moje tweety:';
        echo '<br>';
        $loadedTweetsByUserId = Tweet::loadAllTweetsByUserId($conn, $_GET['userId']);
        
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
        echo '<br>';
        echo 'wyslij mi wiadomosc:';
        echo '<br>';
        
        
        ?>
        <form method="post" action="index.php">
                <textarea name="message" cols="50" rows="4">wpisz tresc wiadomosci</textarea><br>
                <button type="submit" name="submit" value="new_message">wyslij wiadomosc</button><br><br>
            </form>
    </body>
</html>
