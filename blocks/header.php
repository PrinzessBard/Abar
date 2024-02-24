<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="./style.css">-->
    <link rel="shortcut icon" href="./../abar.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>ABAR</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <p class="navbar-brand" >ABAR</p>
    <?php
        session_start();
        if($_SESSION['user_id']) {
    ?>
	<a class="navbar-brand" href="posts.php" >Посты</a>
    <a class="navbar-brand" href="./Friends.php" >Друзья</a>
    <a class="navbar-brand" href="./Profile.php" >Профиль</a>
    <a class="navbar-brand" href="./exit.php" >Выход</a>
    <?php } ?>
</nav>

<div class="alert alert-secondary" role="alert">
    <h3><?php echo $page; ?></h3>
    <!-- <small class="text-muted">By Holikov Egor</small> -->
</div>
<div class="container" >