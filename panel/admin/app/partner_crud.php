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

			// Generate a new unique file name
			$newName = uniqid() . '.' . $extension;

			// Set the path to the new file location
			$newFilePath = $uploadDir . $newName;

			// Upload the file to the server
			if (move_uploaded_file($_FILES['photo']['tmp_name'], $newFilePath)) {
				$img = $newName;
			} else {
				echo 'There was an error uploading the file.';
				exit;
			}
		}

		$stmt = $conn->prepare("INSERT INTO `partner`(`name1`,`photo`) VALUES (?, ?)");
		$name1 = htmlspecialchars($_POST['name1']);
		$stmt->bindParam(1, $name1);
		$stmt->bindParam(2, $img);

		$stmt->execute();

		$_SESSION['success'] = "success";
		header("location:../manage_partner.php");
	}

	if (isset($_POST['update'])) {
		if (!empty($_FILES['photo']['tmp_name'])) {
			$file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
			$new_filename = uniqid() . '.' . $file_extension;
			$filepath = "../../assets/images/" . $new_filename;

			if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filepath)) {
				$img1 = $new_filename;
				@unlink("../../assets/images/" . htmlspecialchars($_POST['old_photo_img']));
			}
		} else {
			$img1 = htmlspecialchars($_POST['old_photo_img']);
		}

		$stmt = $conn->prepare("UPDATE `partner` SET `name1`=?, `photo`=? WHERE id=?");
		$name1 = htmlspecialchars($_POST['name1']);
		$stmt->bindParam(1, $name1);
		$stmt->bindParam(2, $img1);
		$stmt->bindParam(3, htmlspecialchars($_POST['id']));

		$stmt->execute();

		$_SESSION['update'] = "update";

		header("location:../manage_partner.php");
	}

	if (isset($_GET['id'])) {
		$stmt = $conn->prepare("UPDATE `partner` SET delete_status='1' WHERE id=?");
		$stmt->bindParam(1, htmlspecialchars($_GET['id']));
		$stmt->execute();

		$_SESSION['delete'] = "delete";

		header("location:../manage_partner.php");
	}
} catch (PDOException $e) {
	echo "Connection failed: " . htmlspecialchars($e->getMessage());
}
