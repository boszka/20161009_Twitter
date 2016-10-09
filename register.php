
<html>
    <head></head>
    <body>
        <h1>zarejestruj sie</h1>
        <form method="POST">
            <label>
                nazwa uzytkownika:<br>
                <input type="text" name="name">
            </label>
            <br>
            <label>
                E-mail:<br>
                <input type="text" name="email">
            </label>
            <br>
            <label>
                haslo (co najmniej 8 znakow):<br>
                <input type="password" name="password1">
            </label>
            <br>
            <label>
                powtorz haslo:<br>
                <input type="password" name="password2">
            </label>
            <br>
            <input type="submit" value="rejestracja">
        </form>
    </body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && strlen(trim($_POST['name'])) > 0 
            && isset($_POST['email']) 
            && isset($_POST['password1']) && strlen(trim($_POST['password1'])) >= 8 
            && isset($_POST['password2']) && trim($_POST['password1']) == trim($_POST['password2'])) {
        require_once 'src/User.php';
        require_once 'src/connection.php';

        $user = new User();
        $user->setUsername(trim($_POST['name']));
        $user->setEmail(trim($_POST['email']));
        $user->setPassword(trim($_POST['password1']));
        if ($user->saveToDB($conn)) {
            echo 'witaj ' .$_POST['name'] . ' zalozyles wlasnie konto na twitterze';
            
        } else {
            echo 'nie zarejestrowano uzytkownika';
        }
    } else {
        echo 'nie podano wszystkich danych w formularzu, haslo ma mniej niz 8 znakow badz hasla roznia sie';
    }
}
?>

