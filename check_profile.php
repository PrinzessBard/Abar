<?php
session_start();
$mysql = new mysqli("localhost", "root", "root", "abar");

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
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Проверяем, был ли файл успешно загружен
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            // echo "<img src='$target_file' alt='Uploaded Image'>";
            $mysql->query("UPDATE `userdata` SET `ava` = '$target_file' WHERE `userdata`.`id` = '$_SESSION[user_id]'");
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$mysql->close();

header("Location: Profile.php");
exit();