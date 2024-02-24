<?php
$title = "Abar";
$page = "Друзья";
require_once './blocks/header.php';
?>

<?php

$mysql = new mysqli("localhost", "root", "root", "abar");
$result = $mysql->query("SELECT * FROM `userdata`");


?>

<?php
while($row = $result->fetch_assoc()) {
?>

    <div class="card mb-3" >
        <img src="<?=$row['ava']?>" style="width: 100px; height: 100px;" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?=$row['name']?></h5>
            <p class="card-text"><?=$row['bio']?></p>
            <form action="./check_like.php" method="post" >
                <button type="submit" class="btn btn-primary">Лайк</button>
                <?php $_SESSION['name_like'] = $row['name']; ?>
            </form>
            <span><?=$row['like']?></span>
        </div>
    </div>
<?php
}
?>

<?php
$mysql->close();
require_once './blocks/footer.php';
?>
