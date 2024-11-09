<?php
session_start();
include '../../assets/constant/config.php';

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if (isset($_POST['submit'])) {
		// File upload handling
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
				// Handle the error appropriately (e.g., log it)
				exit;
			}
		}

		// Using prepared statements to prevent SQL injection and htmlspecialchars for user input
		$stmt = $conn->prepare("INSERT INTO `testimonial`(`name1`,`designation`,`photo`, `comment`) VALUES (:name1, :designation, :photo, :comment)");
		$stmt->bindParam(':name1', htmlspecialchars($_POST['name1'], ENT_QUOTES, 'UTF-8'));
		$stmt->bindParam(':designation', htmlspecialchars($_POST['designation'], ENT_QUOTES, 'UTF-8'));
		$stmt->bindParam(':photo', $img);
		$stmt->bindParam(':comment', htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8'));

		$stmt->execute();

		$_SESSION['success'] = "success";

		header("location:../manage_testimonial.php");
	}

	if (isset($_POST['update'])) {
		// Similar improvements for file upload handling
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

		// Using prepared statements for SQL query and htmlspecialchars for user input
		$stmt = $conn->prepare("UPDATE `testimonial` SET `name1`=:name1, `designation`=:designation, `photo`=:photo, `comment`=:comment WHERE id=:id");
		$stmt->bindParam(':name1', htmlspecialchars($_POST['name1'], ENT_QUOTES, 'UTF-8'));
		$stmt->bindParam(':designation', htmlspecialchars($_POST['designation'], ENT_QUOTES, 'UTF-8'));
		$stmt->bindParam(':photo', $img);
		$stmt->bindParam(':comment', htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8'));
		$stmt->bindParam(':id', $_POST['id']);

		$stmt->execute();

		$_SESSION['update'] = "update";

		header("location:../manage_testimonial.php");
	}

	if (isset($_GET['id'])) {
		// Using prepared statements for SQL query and htmlspecialchars for user input
		$stmt = $conn->prepare("UPDATE `testimonial` SET delete_status='1' WHERE id=:id");
		$stmt->bindParam(':id', htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));

		$stmt->execute();

		$_SESSION['delete'] = "delete";

		header("location:../manage_testimonial.php");
	}
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
