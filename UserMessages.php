<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Messages</title>
    </head>
    <body>

        <?php
        session_start();
        error_reporting(-1);

        require_once 'src/connection.php';
        require_once 'src/Tweet.php';
        require_once 'src/User.php';
        require_once 'src/Messages.php';

        if (isset($_SESSION['loggedUserId'])) {

            //$activeUser = User::loadUserById($conn, 12);
            $activeUser = User::loadUserById($conn, $_SESSION['loggedUserId']);
            
        
        echo 'Uzytkowniku <b>' . $activeUser->getUsername() . '</b>, poniżej są twoje otrzymane i wysłane wiadomości';
        echo '<br>';


        echo '<br>';
        echo '<b>'. $activeUser->getUsername() .'</b> <a href="logout.php">wyloguj sie</a>';
        
        echo '<br>';
        echo '<a href=edit.php?loggedUserId=' . $_SESSION['loggedUserId'] . '>twoj profil</a>';
        echo '<br>';
        echo '<a href="index.php">strona glowna</a>';
        echo '<br>';
        }
    
    $activeUser = User::loadUserById($conn, $_SESSION['loggedUserId']);
    
     $loadReceived = Message::getMessagesByRecipientUserId($conn, $_SESSION['loggedUserId']);
     echo '<br>';
    echo 'otrzymane wiadomości:';
    echo'<table border = 1>';
    echo '<tr><th>status</th><th>nadawca</th><th>data wysłania</th><th>treść</th></tr>';
    foreach ($loadReceived as $message) {
        
        if (!$message->getIsRead()) {
            $startBold = '<b>';
            $status = "<b>nowa</b>";
            $endBold = '</b>';
        } else {
            $startBold = '';
            $status = "<b>przeczytana</b>";
            $endBold = '';   
        }
        
        $messageId = $message->getId();
        
        echo '<tr>';      
        echo '<td >'.$status.'</td>';
        echo '<td align = "left">'.$startBold.''.trim($message->getSenderUserName()).$endBold.'</td>';
        echo '<td align = "left">'.$startBold.trim($message->getCreationDate()).$endBold.'</td>';
        echo '<td ><a href="ShowMessage.php?id='.$messageId.'">'.$startBold.substr($message->getText(),0,29) .'...'.$endBold.'</a></td>';
        echo '</tr>';
       
        
        
  
    }
    
    echo'</table>';
    echo '<br>';
    
    $loadSent = Message::getMessagesBySenderUserId($conn, $_SESSION['loggedUserId']);
    echo 'wysłane wiadomości:';
        echo'<table border = 1>';
        echo '<tr><th>status</th><th>wysłane do</th><th>data wysłania</th><th>treść</th></tr>';
    foreach ($loadSent as $message) {
                if (!$message->getIsRead()) {
            $startBold = '<b>';
            $status = "<b>nowa</b>";
            $endBold = '</b>';
        } else {
            $startBold = '';
            $status = "<b>przeczytana</b>";
            $endBold = '';
        }
        
        $messageId = $message->getId();
        
        echo '<tr>';
        echo '<td >'.$status.'</td>';
        echo '<td align = "left">'.$startBold.''.trim($message->getRecipientUserName()).$endBold.'</td>';
        echo '<td align = "left">'.$startBold.trim($message->getCreationDate()).$endBold.'</td>';
        echo '<td ><a href="ShowMessage.php?id='.$messageId.'">'.$startBold.substr($message->getText(),0,29).'...'.$endBold.'</a></td>';
        echo '</tr>';
             
        

  
    }
    echo'</table>';
    

?>
</body>
</html>