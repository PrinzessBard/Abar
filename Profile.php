<?php
session_start();

$title = "Profile";
$page = "Profile";
require_once "./blocks/header.php";

if($_SESSION['user_pass_files_sql'] == $_SESSION['user_pass_files'] and $_SESSION['user_name_files_sql'] == $_SESSION['user_name_files'] ) {
    $error = 1;
    $_SESSION['user_name'] = $_SESSION['user_name_files_sql'];
} else {
    header("Location: Login.php");
    exit();
}

$mysql = new mysqli("localhost", "root", "root", "abar");
$result = $mysql->query("SELECT * FROM `userdata` WHERE `id` = '$_SESSION[user_id]'");
$row = $result->fetch_assoc();
$ava = $row['ava'];

?>

<img style="height: 100px" src="<?php echo $ava; ?>" alt="Error...." />

<form action="./check_profile.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="image" id="image">
    <input type="submit" value="Upload Image" name="submit">
</form>

<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Описание</h5>
            <!-- <small>3 days ago</small> -->
        </div>
        <p class="mb-1">Имя: <?=$row['name']?></p>
        <p class="mb-1">Дата рождения: <?=$row['birthday']?></p>
        <small>Что-то еще</small>
    </a>
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Биография</h5>
            <!-- <small class="text-muted">3 days ago</small> -->
        </div>
        <p class="mb-1"><?=$row['bio']?></p>
        <small class="text-muted">Что-то еще</small>
    </a>
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Статус</h5>
            <!-- <small class="text-muted">3 days ago</small> -->
        </div>
        <p class="mb-1">Готов знакомиться с людьми</p>
        <small class="text-muted">В разработке</small>
    </a>
</div>

<?php
$mysql->close();
require_once "./blocks/footer.php";
?>