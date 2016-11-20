
<html>
    <head>
    </head>
    <body>
        <h1>zaloguj sie</h1>
        <form method="POST">

            <label>
                email:
                <input type="text" name="email">
            </label>
            <br>
            <label>
                haslo:
                <input type="password" name="password">
            </label>
            <br>

            <input type="submit" value="zaloguj">
        </form>
        <br>
        jezeli nie posiadasz konta, zapraszamy do <a href="register.php">rejestracji</a>
    </body>
</html>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'src/connection.php';
    require_once 'src/User.php';

    $email = isset($_POST['email']) ? $conn->real_escape_string(trim($_POST['email'])) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $id = User::PasswordGetId($conn, $email, $password);

    if (strlen($password) > 0) {
        if ($id!= -1) {
                $_SESSION['loggedUserId'] = $id; 
                header('location: index.php');
        } else {
            echo "<br>niepoprawna nazwa uzytkownika lub haslo. blad logowania<br>";
        }
    }

    $conn->close();
    $conn = null;
}
?>


