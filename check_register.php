<?php

session_start();

$mysql = new mysqli("localhost", "root", "root", "abar");
//$mysql->query("SET NAMES 'utf8'");

if($mysql->connect_error) {
    echo "Error number: " . $mysql->connect_errno . '<br>';
    echo "Error: " . $mysql->connect_error;
}

$user_name = $_POST['username'];
$user_pass = $_POST['userpass'];
$user_bio = $_POST['bio'];
$user_date = $_POST['date'];

if($user_name == "" and $user_pass == "") {
	header("Location: register.php");
	exit();
}

$mysql->query("INSERT INTO `userdata` (`name`, `pass`, `bio`, `birthday`) VALUES ('$user_name', '$user_pass', '$user_bio', '$user_date')");
// $mysql->query("INSERT INTO `userdata` (`name`, `pass`) VALUES ('$user_name', '$user_pass')");

$mysql->close();
header("Location: index.php");
exit();