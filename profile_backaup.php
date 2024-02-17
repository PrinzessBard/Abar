<?php
$title = "Profile";
$page = "Profile";
require_once './blocks/header.php';
?>

<?php

$mysql = new mysqli('localhost', 'root', 'root', 'abar');

if ($mysql->query("SELECT `ava` FROM `userdata` WHERE `id` = '$_SESSION[user_id]'")) {
//    echo $_COOKIE['ava'];


} else {
// Проверяем, была ли отправлена форма
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Проверяем размер файла
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Позволяем только определенные типы файлов
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Проверяем, был ли файл успешно загружен
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//            echo $target_name;
//            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
//            echo "<img src='$target_file' alt='Uploaded Image'>";
                $mysql->query("UPDATE `userdata` SET `ava` = '$target_file' WHERE `id` = '$_SESSION[user_id]';");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>
<?php
$ava = $mysql->query("SELECT `ava` FROM `userdata` WHERE `id` = '$_SESSION[user_id]'"); ?>
    <img src="<?= $ava ?>" alt='Uploaded Image'>

<?php if ($_COOKIE['ava']) {
} else {
    ?>
    <form method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit">
    </form>
<?php } ?>


    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Описание</h5>
                <!-- <small>3 days ago</small> -->
            </div>
            <p class="mb-1">Имя: Егор</p>
            <p class="mb-1">Дата рождения: 02.06.2009</p>
            <small>Что-то еще</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Биография</h5>
                <!-- <small class="text-muted">3 days ago</small> -->
            </div>
            <p class="mb-1">Текст биографии.</p>
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
unset($_COOKIE['ava']);
$mysql->close();
//require_once './blocks/footer.php';
//?>