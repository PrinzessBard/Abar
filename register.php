<?php
$title = "Register";
$page = "Register";
require_once './blocks/header.php';
session_start();
?>

<div class="container" >
    <form action="./check_register.php" method="post" >
        <input type="text" name="username" placeholder="Name..." class="form-control mt-3">
        <input type="password" name="userpass" placeholder="Password..." class="form-control mt-3">
        <textarea name="bio" class="form-control mt-3" placeholder="Bio"></textarea>
        <input type="date" name="date" class="form-control mt-3">
        <input type="submit" class="btn btn-success mt-3" >
    </form>
    <?php
        if($_SESSION['error'] == 1) {
            echo '<script> alert("Такое имя и такой пароль уже существуют") </script>';
        } else if($_SESSION['error'] == 2) {
            echo '<script> alert("Такой пароль уже есть уже есть") </script>';
        } else if($_SESSION['error'] == 3) {
            echo '<script> alert("Такое имя уже существуют") </script>';
        }
     ?>
</div>
<?php
require_once './blocks/footer.php'
?>
