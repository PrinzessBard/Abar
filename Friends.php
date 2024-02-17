<?php
$title = "Abar";
$page = "Friends";
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
            <button type="submit" class="btn btn-primary">Like</button>
        </div>
    </div>
<?php
}
?>

<?php
$mysql->close();
require_once './blocks/footer.php';
?>
