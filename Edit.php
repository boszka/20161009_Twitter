<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>edit</title>
    </head>
    <body>



        <?php
        session_start();


        require_once 'src/connection.php';
        require_once 'src/Tweet.php';
        require_once 'src/User.php';
        require_once 'src/Messages.php';



        $activeuser = User::loadUserById($conn, $_SESSION['loggedUserId']);


        echo 'Witaj <b>' . $activeuser->getUsername() . ' </b>tu mozesz edytowac swoj profil';
        echo '<br>';
        echo '<br>';
        echo 'Informacje o Tobie:<br> ' . $activeuser->getInformation() . '!<br>';
        echo '<br>';

        echo '<br>';
        echo '<b>' . $activeuser->getUsername() . '</b> <a href="Logout.php">wyloguj sie</a>';
        echo '<br>';
        echo '<a href="Index.php">strona glowna</a>';
        echo '<br>';
        echo '<a href=UserMessages.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoje wiadomosci</a>';
        echo '<br>';
        echo '<br>';






        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedUserById = User::loadUserById($conn, $_SESSION['loggedUserId']);
           
                    $wszystko_OK = true;
                    if (isset($_POST['password1']) && isset($_POST['password2'])) {
                        $password1 = $_POST['password1'];
                        $password2 = $_POST['password2'];
                        if (strlen($password1) >= 8 && strlen($password1) <= 20 && $password1 === $password2) {
                            $updatedUserById->setPassword($password1);
                        } else if (strlen($password1) < 6 || strlen($password1) > 16) {
                            $_SESSION['e_password'] = "hasło musi posiadać od 6 do 16 znaków";
                            $wszystko_OK = false;
                        } else {
                            $_SESSION['e_password'] = "hasła różnią się";
                            $wszystko_OK = false;
                        }
                    }
                    if ($wszystko_OK == true) {
                        $updwieżatedUserById->saveToDB($conn);
                        $_SESSION['new_password'] = 'hasło zostało zmienione';
                        header('Refresh:1; url=Edit.php?userId=' . $_SESSION['loggedUserId']);
                    }
            
        }



        echo '<b>' . $activeuser->getUsername() . '</b> tu sa twoje tweety:';
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
            echo '<td><a href=Comments.php?tweetId=' . $tweet->getId() . '>' . '>>>>' . '<a\></td>';
            echo '</tr>';
        }
        echo'</table>';
        ?>

        <form method="POST" action="Edit.php">

            Podaj nowe hasło: <br> <input type="password" name="password1"><br>
            Powtórz nowe hasło: <br> <input type="password" name="password2"><br>
            <button type="submit" name="submit" value="password">Zapisz zmiany</button>

            <?php
            if (isset($_SESSION['e_password'])) {
                echo '<div>' . $_SESSION['e_password'] . '</div>';
                unset($_SESSION['e_password']);
            }
            if (isset($_SESSION['new_password'])) {
                echo '<div>' . $_SESSION['new_password'] . '</div>';
                unset($_SESSION['new_password']);
            }
            ?>

        </form>

    </body>
</html>
