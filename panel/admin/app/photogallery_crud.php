<?php
session_start();
include '../../assets/constant/config.php';

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['submit'])) {
	$uploadDir = '../../assets/images/';
	if ($_FILES['photo']['tmp_name'] != '') {
		$filepath = "../../assets/images/" . $_FILES["photo"]["name"];
		$originalName = basename($_FILES['photo']['name']);
		$extension = pathinfo($originalName, PATHINFO_EXTENSION);

		// Generate a new unique file name
		$newName = uniqid() . '.' . $extension;

		// Set the path to the new file location
		$newFilePath = $uploadDir . $newName;

		// Upload the file to the server
		if (move_uploaded_file($_FILES['photo']['tmp_name'], $newFilePath)) {
			$img = $newName;
		} else {
			// Output an error message
			echo 'There was an error uploading the file.';
		}

		$stmt = $conn->prepare("INSERT INTO `photogallery`(`caption`,`photo`, `showonhome`) VALUES ('" . $_POST['caption'] . "','" . $img . "','" . $_POST['showonhome'] . "')");

		$stmt->execute();
		$_SESSION['success'] = "success";
		header("location:../manage_photo.php");
	}
}

if (isset($_POST['update'])) {
	if ($_FILES['photo']['tmp_name'] != '') {
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


	$stmt = $conn->prepare("UPDATE `photogallery` SET `caption`='" . $_POST['caption'] . "',`photo`='" . $img . "',`showonhome`='" . $_POST['showonhome'] . "' WHERE id='" . $_POST['id'] . "'");

	$stmt->execute();

	$_SESSION['update'] = "update";

	header("location:../manage_photo.php");
}

if (isset($_GET['id'])) {
	$stmt = $conn->prepare("UPDATE `photogallery` SET delete_status='1' where id='" . $_GET['id'] . "'");

	$stmt->execute();

	$_SESSION['delete'] = "delete";

	header("location:../manage_photo.php");
}
?>
