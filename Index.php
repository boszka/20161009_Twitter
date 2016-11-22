<?php
session_start();
if (!isset($_SESSION['loggedUserId'])) {
    header('Location: Login.php');
}
?>

<html>
    <head></head>
    <body>
        <?php
        require_once 'src/connection.php';
        require_once 'src/User.php';
        require_once 'src/Tweet.php';
        require_once 'src/Comment.php';
        require_once 'src/Messages.php';

        if (isset($_SESSION['loggedUserId'])) {


            $loadedUser = User::loadUserById($conn, $_SESSION['loggedUserId']);

            echo 'Uzytkowniku <b>' . $loadedUser->getUsername() . '</b>, witamy na twitterze!';
            echo '<br>';
            echo '<br>';
            echo '<b>' . $loadedUser->getUsername() . '</b> <a href="Logout.php">wyloguj sie</a>';
            echo '<br>';
            echo '<a href=Edit.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoj profil</a>';
            echo '<br>';
            echo '<a href=UserMessages.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoje wiadomosci</a>';
            echo '<br>';
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['tweet']) && strlen($_POST['tweet']) > 0) {
                $tweet = $_POST['tweet'];
                $newTweet = new Tweet();
                $newTweet->setUserId($_SESSION['loggedUserId']);
                $newTweet->setText($tweet);
                $newTweet->setCreationDate(date('Y-m-d H:i:s'));
                if ($newTweet->saveToDB($conn)) {
                    echo "wlasnie dodales tweeta.<br>";
                    header('Location: Index.php');
                } else {
                    echo "nie udalo sie dodac tweeta.<br>" . $conn->error;
                }
            } if (strlen($_POST['tweet']) <= 0) {
                echo 'nie mozna dodac tweeta bez tresci';
            }
        }
        ?>
        <br>
        <div>
            <form method="post" action="Index.php">
                <textarea name="tweet" cols="50" rows="4" placeholder="wpisz tresc tweeta"></textarea><br>
                <button type="submit" name="submit" value="new_tweet">dodaj tweeta</button><br><br>
            </form>
        </div>
    </body>

</html>

<?php


require_once 'src/connection.php';
require_once 'src/User.php';
require_once 'src/Tweet.php';
require_once 'src/Comment.php';
require_once 'src/Messages.php';

$loadedTweets = Tweet::loadAllTweets($conn);
//$loadedCommentsByTweetId = Comment::loadAllCommentsByTwId($conn, $_GET['$tweetId']);



echo'<table border = 1>';
echo '<tr><th>autor tweeta</th><th>tweet</th><th>data dodania tweeta</th><th>komentarze</th></tr>';
foreach ($loadedTweets as $tweet) {
    echo '<tr>';

    echo '<td><a href=UserTweets.php?userId=' . $tweet->getUserId() . '>' . $tweet->getUsername() . '</a></td>';

    echo '<td>' . $tweet->getText() . '</td>';
    echo '<td>' . $tweet->getCreationDate() . '</td>';
    //echo '<td>' . $tweet->getCreationDate() . '</td>';
    echo '<td><a href=Comments.php?tweetId=' . $tweet->getId() . '>' . '>>>>' . '<a\></td>';
    echo '</tr>';
}
echo'</table>';
?>
