<?php

session_start();

$mysql = new mysqli("localhost", "root", "root", "abar");
//$mysql->query("SET NAMES 'utf8'");
$result = $mysql->query("SELECT * FROM `userdata`");

if($mysql->connect_error) {
    echo "Error number: " . $mysql->connect_errno . '<br>';
    echo "Error: " . $mysql->connect_error;
}

$user_name = $_POST['username'];
$user_pass = md5($_POST['userpass']);
$user_bio = $_POST['bio'];
$user_date = $_POST['date'];

if($user_name == "" and $user_pass == "") {
	header("Location: register.php");
	exit();
}

while($row = $result->fetch_assoc()) {
	if($user_name == $row['name'] and $user_pass == $row['pass']) {
		$_SESSION['error'] = 1;
		header("Location: register.php");
		exit();
	} else if($user_pass == $row['pass']) {
		$_SESSION['error'] = 2;
		header("Location: register.php");
		exit();
	} else if($user_name == $row['name']) {
		$_SESSION['error'] = 3;
		header("Location: register.php");
		exit();
	}
}

$mysql->query("INSERT INTO `userdata` (`name`, `pass`, `bio`, `birthday`, `ava`, `likes`) VALUES ('$user_name', '$user_pass', '$user_bio', '$user_date', 'no', 0)");
// $mysql->query("INSERT INTO `userdata` (`name`, `pass`) VALUES ('$user_name', '$user_pass')");

$mysql->close();
header("Location: index.php");
exit();