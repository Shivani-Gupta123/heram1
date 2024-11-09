<?php
session_start();
include '../../assets/constant/config.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        $heading = htmlspecialchars($_POST['heading']);
        $short_text = htmlspecialchars($_POST['short_text']);

        $stmt = $conn->prepare("INSERT INTO `career`(`heading`, `short_text`) VALUES (?, ?)");
        $stmt->execute([$heading, $short_text]);

        $_SESSION['success'] = "success";

        header("location:../manage_career.php");
    }

    if (isset($_POST['update'])) {
        $heading = htmlspecialchars($_POST['heading']);
        $short_text = htmlspecialchars($_POST['short_text']);
        $id = htmlspecialchars($_POST['id']);

        $stmt = $conn->prepare("UPDATE `career` SET `heading`=?,`short_text`=? WHERE id=?");
        $stmt->execute([$heading, $short_text, $id]);

        $_SESSION['update'] = "update";

        header("location:../manage_career.php");
    }

    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
        $stmt = $conn->prepare("UPDATE `career` SET delete_status='1' where id=?");
        $stmt->execute([$id]);

        $_SESSION['delete'] = "delete";

        header("location:../manage_career.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    // Display a generic error message
    echo "An error occurred. Please try again later.";
}
