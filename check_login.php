<?php

session_start();

////////////////////////////////////////////////

$mysql = new mysqli("localhost", "root", "root", "abar");
//$mysql->query("SET NAMES 'utf8'");

if($mysql->connect_error) {
    echo "Error number: " . $mysql->connect_errno . '<br>';
    echo "Error: " . $mysql->connect_error;
}

$result = $mysql->query("SELECT * FROM `userdata`");

/////////////////////////////////////////////////////

function redirect_to_login() {
	header("Location: Login.php");
	exit();
}

function redirect_to_files() {
    header("Location: posts.php");
    exit();
}

/////////////////////////////////////

$user_pass = $_POST['userpass'];
$user_name = $_POST['username'];
$_SESSION['user_pass_files'] = $user_pass;
$_SESSION['user_name_files'] = $user_name;
$_SESSION['user_pass_files_sql'] = 0;
$_SESSION['user_name_files_sql'] = 0;

if(strlen($user_pass) <= 1) {
	$_SESSION['name_error'] = "Name!";
	redirect_to_login();
} else if(($user_name) <= 1) {
	$_SESSION['pass_error'] = "Pass!";
	redirect_to_login();
}

while($row = $result->fetch_assoc()) {
    if($user_pass == $row['pass'] && $user_name == $row['name']) {
        $_SESSION['user_pass_files_sql'] = $user_pass;
		$_SESSION['user_name_files_sql'] = $user_name;
        $_SESSION['user_id'] = $row['id'];
        $mysql->close();
        redirect_to_files();
    }
}

redirect_to_login();
$mysql->close();








