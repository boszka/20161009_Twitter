
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

    if (strlen($password) > 0) {
        if ($userId = User::logIn($conn, $email, $password)) {
            $_SESSION['loggedUserId'] = $userId;
            header("Location: index.php");
        } else {
            echo "blad logowania<br>";
        }
    }

    $conn->close();
    $conn = null;
}
?>


