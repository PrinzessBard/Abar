<?php
session_start();

if($_SESSION['user_id']) {
    session_unset();
}

header('Location: index.php');
exit();