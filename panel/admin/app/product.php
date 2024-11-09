<?php
session_start();
include '../../assets/constant/config.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {

        $filepath = "../../assets/images/" . htmlspecialchars($_FILES["photo"]["name"], ENT_QUOTES, 'UTF-8');

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filepath)) {
            $img = htmlspecialchars($_FILES["photo"]["name"], ENT_QUOTES, 'UTF-8');
        } else {
            echo "Error !!";
        }

        // $filepath = "../../assets/images/" . htmlspecialchars($_FILES["banner"]["name"], ENT_QUOTES, 'UTF-8');
        // if (move_uploaded_file($_FILES["banner"]["tmp_name"], $filepath)) {
        //     $img1 = htmlspecialchars($_FILES["banner"]["name"], ENT_QUOTES, 'UTF-8');
        // } else {
        //     echo "Error !!";
        // }

        $stmt = $conn->prepare("INSERT INTO `product`(`heading`, `shortcontent`, `content`,`photo`, `metatitle`,`metadescription`,`keywords`,`robots`,`date`) VALUES (?,?,?,?,?,?,?,?,?)");

        $stmt->execute([
            htmlspecialchars($_POST['heading'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['shortcontent'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'),
            $img,
            htmlspecialchars($_POST['metatitle'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['metadescription'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['keywords'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['robots'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8')
        ]);

        $_SESSION['success'] = "success";

        header("location:../manage_product.php");
    }

    if (isset($_POST['update'])) {

        if ($_FILES['photo']['tmp_name'] != '') {
            $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
            $new_filename = uniqid() . '.' . $file_extension;
            $filepath = "../../assets/images/" . $new_filename;

            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filepath)) {
                $img = $new_filename;

                @unlink("../../assets/images/" . htmlspecialchars($_POST['old_photo_img'], ENT_QUOTES, 'UTF-8'));
            }
        } else {
            $img = htmlspecialchars($_POST['old_photo_img'], ENT_QUOTES, 'UTF-8');
        }

        // if ($_FILES['banner']['tmp_name'] != '') {
        //     $file_extension = pathinfo($_FILES["banner"]["name"], PATHINFO_EXTENSION);
        //     $new_filename = uniqid() . '.' . $file_extension;
        //     $filepath = "../../assets/images/" . $new_filename;

        //     if (move_uploaded_file($_FILES["banner"]["tmp_name"], $filepath)) {
        //         $img1 = $new_filename;

        //         @unlink("../../assets/images/" . htmlspecialchars($_POST['old_banner_img'], ENT_QUOTES, 'UTF-8'));
        //     }
        // } else {
        //     $img1 = htmlspecialchars($_POST['old_banner_img'], ENT_QUOTES, 'UTF-8');
        // }

        $stmt = $conn->prepare("UPDATE `product` SET `heading`=?,`shortcontent`=?,`content`=?,`photo`=?,`metatitle`=?,`metadescription`=?, `keywords`=?, `robots`=?, `date`=? WHERE id=? ");

        $stmt->execute([
            htmlspecialchars($_POST['heading'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['shortcontent'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'),
            $img,
            htmlspecialchars($_POST['metatitle'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['metadescription'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['keywords'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['robots'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8')
        ]);

        $_SESSION['update'] = "update";
        header("location:../manage_product.php");
    }

    if (isset($_POST['del_id'])) {

        $stmt = $conn->prepare("UPDATE `product` SET delete_status='1' WHERE id=? ");

        $stmt->execute([htmlspecialchars($_POST['del_id'], ENT_QUOTES, 'UTF-8')]);

        $_SESSION['delete'] = "delete";

        header("location:../manage_product.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
