<?php
    $title = "Login";
    $page = "Login";
    require_once './blocks/header.php';
?>
<div class="container" >
    <form action="./check_login.php" method="post" >
		<input type="text" name="username" placeholder="Name..." class="form-control mt-3" >
		<div class="text-danger" ><?$_SESSION['name_error']?></div> <br>
        <input type="password" name="userpass" placeholder="Password..." class="form-control mt-3">
		<div class="text-danger" ><?$_SESSION['pass_error']?></div> <br>
        <input type="submit" class="btn btn-success mt-3" > <br>
    </form>
	<button class="btn btn-success mt-3 bg-primary position-absolute" ><a class="text-light" style="text-decoration: none;" href="register.php" >Register</a></button>
</div>
<?php
    require_once './blocks/footer.php';
?>
