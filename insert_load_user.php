<?php

error_reporting(-1);

require_once 'src/connection.php';
require_once 'src/User.php';
/*
  $user = new User();
  $user->setEmail('111111111@gmail.com');
  $user->setUsername('usr1111111111');
  $user->setPassword('1111111111111');
  $user->saveToDB($conn);
 */

$loadedUsers = User::loadAllUsers($conn);
//var_dump($loadedUsers);

echo'<table border = 1>';
echo '<tr><th>Id</th><th>email</th><th>user</th><th>password</th></tr>';
foreach ($loadedUsers as $user) {
    echo '<tr>';
    echo '<td>' . $user->getId() . '</td>';
    echo '<td>' . $user->getEmail() . '</td>';
    echo '<td>' . $user->getUsername() . '</td>';
    echo '<td>' . $user->getHashedPassword() . '</td>';
    echo '</tr>';
}
echo'</table>';

$loadedUser = User::loadUserById($conn, 1);
echo 'email: ' . $loadedUser->getEmail();
echo '<br>';

echo 'nazwa uzytkownika: ' . $loadedUser->getUsername();
echo '<br>';

echo 'haslo: ' . $loadedUser->getHashedPassword();
echo '<br>';




