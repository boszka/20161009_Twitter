<?php

 $servername = 'localhost';
 $username = 'root';
 $password = 'CodersLab';
 $basename = '20161009_Twitter_db';


$conn = new mysqli($servername, $username, $password, $basename);
if($conn->connect_error) {
    die("Connection failed: $conn->connect_error");
}

