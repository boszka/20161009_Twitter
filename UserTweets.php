<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>UserTweets and sending messagess</title>
    </head>
    <body>

        <?php
        session_start();
        error_reporting(-1);

        require_once 'src/connection.php';
        require_once 'src/Tweet.php';
        require_once 'src/User.php';
        require_once 'src/Messages.php';


        $loadedUser = User::loadUserById($conn, $_GET['userId']);
        $activeUser = User::loadUserById($conn, $_SESSION['loggedUserId']);



        echo '<br>';
        echo 'Witam, jestem <b>' . $loadedUser->getUsername() . '</b>!<br>';
        echo '<br>';
        echo '<br>';
        echo 'Ponizej kilka slow o mnie:<br> ' . $loadedUser->getInformation() . '!<br>';
        echo '<br>';

        echo 'wyslij mi wiadomosc:';
        echo '<br>';

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['userId'])) {
                $_SESSION['receiverID'] = $_GET['userId'];
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['message']) && strlen(trim($_POST['message'])) > 0 &&
                    isset($_SESSION['receiverID'])) {
                $message = $_POST['message'];
                $newMessage = new Message();
                $newMessage->setSenderUserId($_SESSION['loggedUserId']);
                $newMessage->setRecipientUserId($_SESSION['receiverID']);
                $newMessage->setText($message);
                $newMessage->setCreationDate(date('Y-m-d H:i:s'));
                if ($newMessage->saveToDB($conn)) {
                    echo "Twoja wiadomość " . User::loadUserById($conn, $_SESSION['receiverID'])->getUserName() . " została wysłana<br>";
                    $conn->close();
                    $conn = null;
                    header('Refresh:1; url=UserTweets.php?userId=' . $_SESSION['receiverID']);
                    unset($_SESSION['receiverID']);
                    exit();
                } else {
                    echo "błąd wysyłania wiadomości<br>";
                }
            }
        }
        ?>
        <form method="POST" action="#">
            <textarea name="message" cols="40" rows="4" placeholder="WPISZ TREŚĆ WIADOMOŚCI"></textarea><br>
            <input type="submit" name="submit" value="WYŚLIJ WIADOMOŚĆ"/><br><br>
        </form>
        <?php
        echo '<a href="index.php">strona glowna</a>';
        echo '<br>';
        echo '' . $activeUser->getUsername() . ' <a href="logout.php">wyloguj sie</a>';
        echo '<br>';
        echo '<br>';


        echo '<br>';
        echo 'A to moje tweety:';
        echo '<br>';
        $loadedTweetsByUserId = Tweet::loadAllTweetsByUserId($conn, $_GET['userId']);

        echo'<table border = 1>';
        echo '<tr><th>Id tweeta</th><th>Id uzytkownika</th><th>uzytkownik</th><th>treść</th><th>data</th><th>komentarze</th></tr>';
        foreach ($loadedTweetsByUserId as $tweet) {
            echo '<tr>';
            echo '<td>' . $tweet->getId() . '</td>';
            echo '<td>' . $tweet->getUserId() . '</td>';
            echo '<td><a href=UserTweets.php?userId=' . $tweet->getUserId() . '>' . $tweet->getUsername() . '</a></td>';
            echo '<td>' . $tweet->getText() . '</td>';
            echo '<td>' . $tweet->getCreationDate() . '</td>';
            echo '<td><a href=Comments.php?tweetId=' . $tweet->getId() . '>' . '>>>>' . '<a\></td>';
            echo '</tr>';
        }
        echo'</table>';
        echo '<br>';
        ?>

    </body>
</html>
