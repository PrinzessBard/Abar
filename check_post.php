<?php

$mysql = new mysqli("localhost", "root", "root", "abar");

$name = $_POST['username'];
$subject = $_POST['subject'];
$post = $_POST['post'];
$date = date('Y:m:d');

$mysql->query("INSERT INTO `userpost` (`id`, `name`, `subject`, `text`, `date`) VALUES (NULL, '$name', '$subject', '$post', '$date')");

$mysql->close();

header("Location: posts.php");
exit();