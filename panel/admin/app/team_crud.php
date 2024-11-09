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

		$stmt = $conn->prepare("INSERT INTO `team`(`name1`,`designation`, `photo`) VALUES (?, ?, ?)");
		$stmt->bindParam(1, htmlspecialchars($_POST['name1'], ENT_QUOTES, 'UTF-8'));
		$stmt->bindParam(2, htmlspecialchars($_POST['designation'], ENT_QUOTES, 'UTF-8'));
		$stmt->bindParam(3, $img);

		$stmt->execute();

		$_SESSION['success'] = "success";
		header("location:../manage_team.php");
	}

	if (isset($_POST['update'])) {
		if (!empty($_FILES['photo']['tmp_name'])) {
			$file_extension = pathinfo(htmlspecialchars($_FILES["photo"]["name"], ENT_QUOTES, 'UTF-8'), PATHINFO_EXTENSION);
			$new_filename = uniqid() . '.' . $file_extension;
			$filepath = "../../assets/images/" . $new_filename;

			if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filepath)) {
				$img = $new_filename;
				@unlink("../../assets/images/" . $_POST['old_photo_img']);
			}
		} else {
			$img = $_POST['old_photo_img'];
		}

		$stmt = $conn->prepare("UPDATE `team` SET `name1`=?, `designation`=?, `photo`=? WHERE id=?");
		$stmt->bindParam(1, htmlspecialchars($_POST['name1'], ENT_QUOTES, 'UTF-8'));
		$stmt->bindParam(2, htmlspecialchars($_POST['designation'], ENT_QUOTES, 'UTF-8'));
		$stmt->bindParam(3, $img);
		$stmt->bindParam(4, $_POST['id']);

		$stmt->execute();

		$_SESSION['update'] = "update";

		header("location:../manage_team.php");
	}

	if (isset($_GET['id'])) {
		$stmt = $conn->prepare("UPDATE `team` SET delete_status='1' WHERE id=?");
		$stmt->bindParam(1, htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
		$stmt->execute();

		$_SESSION['delete'] = "delete";

		header("location:../manage_team.php");
	}
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
