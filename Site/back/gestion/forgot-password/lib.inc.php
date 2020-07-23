<?php
$db = mysqli_connect("localhost","pinkman","azertyuiop","pinkman");
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

date_default_timezone_set('Europe/Paris');
$error="";