<?php
    $title = "Posts";
    $page = "Посты";
    require_once './blocks/header.php';

    session_start();


    if($_SESSION['user_pass_files_sql'] == $_SESSION['user_pass_files'] and $_SESSION['user_name_files_sql'] == $_SESSION['user_name_files'] ) {
		$_SESSION['user_name'] = $_SESSION['user_name_files_sql'];
    } else {
        header("Location: Login.php");
        exit();
    }

    $mysql = new mysqli("localhost", "root", "root", "abar");
    $result = $mysql->query("SELECT * FROM `userpost` ORDER BY `userpost`.`id` DESC");

?>
<!--<div class="fixed-center w-50 p-3" >-->
    <form action="./check_post.php" method="post" >
        <!-- <input type="text" name="username" class="form-control" placeholder="Name..."> <br> -->
        <input type="text" name="subject" placeholder="Тема..." class="form-control"> <br>
        <textarea name="post" class="form-control" placeholder="Текст..." ></textarea>
        <button type="submit" class="btn btn-primary mt-3" >Выложить</button>
    </form> <hr>

<?php
while($row = $result->fetch_assoc()) {
?>
    <div class="card">
        <div class="card-header">
            <span><?=$row['subject']?></span>
            <div class="vr"></div>
            <span><?=$row['name']?></span>
        </div>
        <div class="card-body">
            <p class="card-title"><?=$row['text']?></p>
            <form action="./delete_post.php" method="post">
                <input type="hidden" name="id", value="<?=$row['id']?>">
                <input type="submit" class="btn btn-danger" value="Удалить" >
            </form>
        </div>
    </div> <br>
<?php
}
?>

<?php
$mysql->close();
    require_once './blocks/footer.php';
?>
