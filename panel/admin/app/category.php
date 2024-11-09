<?php
session_start();
include '../../assets/constant/config.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        $uploadDir = '../../assets/images/';

        if (!empty($_FILES['photo']['tmp_name'])) {
            $originalName = basename($_FILES['photo']['name']);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);

            $newName = uniqid() . '.' . $extension;
            $newFilePath = $uploadDir . $newName;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $newFilePath)) {
                $img = $newName;
            } else {
                echo 'There was an error uploading the file.';
                exit;
            }
        }

        $stmt = $conn->prepare("INSERT INTO `category`(`name`,`photo`) VALUES (?, ?)");

        $name = htmlspecialchars($_POST['name']);
        $stmt->execute([$name, $img]);

        $_SESSION['success'] = "success";

        header("location:../manage_category.php");
    }

    if (isset($_POST['update'])) {
        if (!empty($_FILES['photo']['tmp_name'])) {
            $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
            $new_filename = uniqid() . '.' . $file_extension;
            $filepath = "../../assets/images/" . $new_filename;

            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filepath)) {
                $img = $new_filename;

                @unlink("../../assets/images/" . $_POST['old_photo_img']);
            }
        } else {
            $img = $_POST['old_photo_img'];
        }

        $stmt = $conn->prepare("UPDATE `category` SET `name`=?,`photo`=? WHERE id=?");

        $name = htmlspecialchars($_POST['name']);
        $stmt->execute([$name, $img, $_POST['id']]);
        $_SESSION['update'] = "update";

        header("location:../manage_category.php");
    }

    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
        $stmt = $conn->prepare("UPDATE `category` SET delete_status='1' WHERE id=?");
        $stmt->execute([$id]);

        $_SESSION['delete'] = "delete";

        header("location:../manage_category.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . htmlspecialchars($e->getMessage());
}
