<?php

$mysql = new mysqli("localhost", "root", "root", "abar");
$id = $_POST["id"];
//echo $_POST["id"];
$mysql->query("DELETE FROM `userpost` WHERE `id` = '$id'");
$mysql->close();

header("Location: posts.php");
exit();

