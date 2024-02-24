<?php
    $title = "Login";
    $page = "Вход";
    require_once './blocks/header.php';
?>

<div class="container" >
    <form action="./check_login.php" method="post" >
        <label for="username"><h4>Имя</h4></label>
		<input type="text" name="username" placeholder="Имя..." class="form-control" > </br>
		<div class="text-danger" ><?$_SESSION['name_error']?></div> <br>
        <label for="userpass"><h4>Пароль</h4></label>
        <input type="password" name="userpass" placeholder="Пароль..." class="form-control">
		<div class="text-danger" ><?$_SESSION['pass_error']?></div> <br>
        <input type="submit" class="btn btn-success mt-3" > <br>
    </form>
	<button class="btn btn-success mt-3 bg-primary position-absolute" ><a class="text-light" style="text-decoration: none;" href="register.php" >Регистрация</a></button>
</div>
<?php
    require_once './blocks/footer.php';
?>
