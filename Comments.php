<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Comments for Tweets</title>
    </head>
    <body>


        <?php
        session_start();
        require_once 'src/connection.php';
        require_once 'src/User.php';
        require_once 'src/Tweet.php';
        require_once 'src/Comment.php';

        if (isset($_SESSION['loggedUserId'])) {
            $loadedUser = User::loadUserById($conn, $_SESSION['loggedUserId']);

            echo 'Uzytkowniku ' . $loadedUser->getUsername() . ', tutaj możesz dodać komentarz do tweeta!';
            echo '<br>';
            echo '' . $loadedUser->getUsername() . ' <a href="Logout.php">wyloguj sie</a>';
            echo '<br>';
            echo '<a href=edit.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoj profil</a>';
            echo '<br>';
            echo '<a href=UserMessages.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoje wiadomosci</a>';
            echo '<br>';
            echo '<a href="Index.php">strona glowna</a>';
            echo '<br>';
            echo '<br>';
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tweetId = $_POST['tweetId'];
            if (isset($_POST['comment']) && strlen($_POST['comment']) > 0) {
                $newComment = new Comment();
                $newComment->setUserId($_SESSION['loggedUserId']);
                $newComment->setTweetId($tweetId);
                $newComment->setText($_POST['comment']);
                $newComment->setCreationDate(date('Y-m-d H:i:s'));
                if ($newComment->saveToDB($conn)) {
                    echo '<br>';
                    echo "wlasnie dodales komentarz.<br>";
                    echo '<br>';
                } else {
                    echo '<br>';
                    echo "nie udalo sie dodac komentarza.<br>" . $conn->error;
                }
            } if (strlen($_POST['comment']) <= 0) {
                echo '<br>';
                echo 'nie mozna dodac komentarza bez tresci';
            }
        } else {
            $tweetId = $_GET['tweetId'];
        }
        $loadTweet = Tweet::loadTweetById($conn, $tweetId);
        echo 'poniżej szczegóły tweeta';
        echo '<div>';
        echo'<table border = 1>';
        echo '<tr><th>autor tweeta</th><th>tweet</th><th>data</th>';
        echo '<tr>';
        echo '<td><a href=UserTweets.php?userId=' . $loadTweet->getUserId() . '>' . $loadTweet->getUsername() . '</a></td>';
        echo '<td>' . $loadTweet->getText() . ' <a href=Comments.php?tweetId=' . $loadTweet->getId() . '<a\></td>';
        echo '<td>' . $loadTweet->getCreationDate() . '</td>';
        echo '</tr>';
        echo'</table>';
        echo '</div>';

        $loadAllComments = Comment::loadAllCommentsByTweetId($conn, $tweetId);
        echo '<br>';
        echo 'komentarze użytkowników';
        echo '<div>';
        echo'<table border = 1>';
        echo '<tr><th>autor komentarza</th><th>komentarz</th><th>data</th>';
        foreach ($loadAllComments as $comment) {
            echo '<tr>';
            echo '<td><a href=UserTweets.php?userId=' . $comment->getUserId() . '>' . $comment->getUsername() . '</a></td>';
            echo '<td>' . $comment->getText() . '</td>';
            echo '<td>' . $comment->getCreationDate() . '</td>';
            echo '</tr>';
        }
        echo'</table>';
        echo '</div>';
        $conn->close();
        $conn = null;
        ?>

        <br>
        <div>
            <form method="post" action="Comments.php">
                <?php
                echo('<input type="hidden" name="tweetId" value="' . $tweetId . '">');
                ?>
                <textarea name="comment" cols="50" rows="4">twój komentarz</textarea><br>
                <button type="submit" name="submit" value="new_comment">dodaj komentarz</button><br><br>
            </form>
        </div>
    </body>
</html>