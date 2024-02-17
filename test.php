<?php
$title  = "Profile";
$page = "Profile";
require_once "./blocks/header.php";

// $mysql = new mysqli("localhost", "root", "root", "abar");

?>

<form action="./check_profile.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="image" id="image">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php

?>