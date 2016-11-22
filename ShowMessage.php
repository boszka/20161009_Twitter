<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Messages</title>
    </head>
    <body>

        <?php
        session_start();
       

        if (isset($_GET['id']) && is_numeric($_GET['id']) == true) {
            $_SESSION['messageId'] = (int) $_GET['id'];
        }

        require_once 'src/connection.php';
        require_once 'src/Tweet.php';
        require_once 'src/User.php';
        require_once 'src/Messages.php';



        $activeUser = User::loadUserById($conn, $_SESSION['loggedUserId']);
        //$loadedUser = User::loadUserById($conn, $_GET['messageId']);



        if (isset($_SESSION['messageId'])) {
            $loadMessage = Message::loadMessageById($conn, $_SESSION['messageId']);
            if (isset($loadMessage) && ($loadMessage->getRecipientUserId() == $_SESSION['loggedUserId'] ||
                    $loadMessage->getSenderUserId() == $_SESSION['loggedUserId'] )) {
                echo '<b>Szczegóły wiadomości:</b>';
                echo'<table border = 1>';

                echo '<tr>';
                echo '<td width = "15%">Nadawca: </td>';
                echo '<td width = "15%">Odbiorca: </td>';
                echo '<td width = "15%">data: </td>';
                echo '<td width = "50%">treść:</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>' . trim($loadMessage->getSenderUserName()) . '</td>';
                echo '<td>' . trim($loadMessage->getRecipientUserName()) . '</td>';
                echo '<td>' . trim($loadMessage->getCreationDate()) . '</td>';
                echo '<td>' . $loadMessage->getText() . '</td>';

                echo'</table>';

                if (!$loadMessage->getIsRead() && $loadMessage->getRecipientUserId() == $_SESSION['loggedUserId']) {
                    $loadMessage->saveToDB($conn);
                }
            }
        }


        if (isset($_SESSION['loggedUserId'])) {


            $loadedUser = User::loadUserById($conn, $_SESSION['loggedUserId']);

            echo 'Uzytkowniku <b>' . $loadedUser->getUsername() . '</b>';
            echo '<br>';
            echo '<a href=UserMessages.php>wróć do wiadomosci</a>';

            echo '<br>';
            echo ' <a href="Logout.php">wyloguj sie</a>';

            echo '<br>';
            echo '<a href=edit.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoj profil</a>';
            echo '<br>';
            echo '<a href="Index.php">strona glowna</a>';
            echo '<br>';
        }
        $conn->close();
        $conn = null;
        ?>

    </body>
</html>
