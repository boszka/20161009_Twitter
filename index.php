<?php
session_start();
if (!isset($_SESSION['loggedUserId'])) {
    header('Location: login.php');
}
?>

<html>
    <head></head>
    <body>
        <?php
        require_once 'src/connection.php';
        require_once 'src/User.php';
        require_once 'src/Tweet.php';
        if (isset($_SESSION['loggedUserId'])) {

            //$loadedUser = User::loadUserById($conn, 12);
            $loadedUser = User::loadUserById($conn, $_SESSION['loggedUserId']);
        
        echo 'Uzytkowniku ' . $loadedUser->getUsername() . ', witamy na twitterze!';
        echo '<br>';


        echo '<br>';
        echo '<a href="logout.php">wyloguj sie</a>';
        echo '<br>';
        echo '<a href=edit.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoj profil</a>';
        echo '<br>';
        echo '<a href=messages.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoje wiadomosci</a>';
        echo '<br>';
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tweet']) && strlen($_POST['tweet']) > 0) {
        $tweet = $_POST['tweet'];
        $newTweet = new Tweet();
        $newTweet->setUserId($_SESSION['loggedUserId']);
        $newTweet->setText($tweet);
        $newTweet->setCreationDate(date('Y-m-d H:i:s'));
        if($newTweet->saveToDB($conn)) {
            echo "wlasnie dodales tweeta.<br>";
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
            <form method="post" action="index.php">
                <textarea name="tweet" cols="50" rows="4">wpisz tresc tweeta</textarea><br>
                <button type="submit" name="submit" value="new_tweet">dodaj tweeta</button><br><br>
            </form>
        </div>
    </body>

</html>

<?php
error_reporting(-1);

require_once 'src/connection.php';
require_once 'src/Tweet.php';


$loadedTweets = Tweet::loadAllTweets($conn);


echo'<table border = 1>';
echo '<tr><th>uzytkownik</th><th>tweet</th><th>data</th></tr>';
foreach ($loadedTweets as $tweet) {
    echo '<tr>';

    echo '<td><a href=UserTweets.php?userId=' . $tweet->getUserId() . '>' . $tweet->getUsername() . '</a></td>';
    echo '<td>' . $tweet->getText() . '</td>';
    echo '<td>' . $tweet->getCreationDate() . '</td>';
    echo '</tr>';
}
echo'</table>';
?>
