<?php

$mysql = new mysqli("localhost", "root", "root", "abar");
$result = $mysql->query("SELECT * FROM `userdata`");

$mysql->query("UPDATE `userdata` SET `likes` = `likes` + 1 WHERE `userdata`.`name` = '$_SESSION[name_like]'");

$mysql->close();
header("Location: Friends.php");
exit();