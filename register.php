<?php
$title = "Регистрация";
$page = "Register";
require_once './blocks/header.php';
session_start();
?>

<div class="container" >
    <form action="./check_register.php" method="post" >
        <label for="username"><h4>Имя</h4></label>
        <input type="text" name="username" placeholder="Имя..." class="form-control"> <br>
        <label for="userpass"><h4>Пароль</h4></label>
        <input type="password" name="userpass" placeholder="Пароль..." class="form-control"><br>
        <label for="bio"><h4>Биография</h4></label>
        <textarea name="bio" class="form-control" placeholder="Немного о себе"></textarea><br>
        <label for="date"><h4>Дата рождения</h4></label>
        <input type="date" name="date" class="form-control">
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
