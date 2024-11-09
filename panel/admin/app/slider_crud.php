<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		if (isset($_POST['submit'])) 
		{
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
                echo 'There was an error uploading the file.';
            }
        }

			$stmt = $conn->prepare("INSERT INTO `slider`(`photo`,`heading`, `short_text`) VALUES (?,?,?)");

			$stmt->execute([$img,$_POST['heading'],$_POST['short_text']]);

			$_SESSION['success']="success";
		

			header("location:../manage_slider.php" ); 

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

    $stmt = $conn->prepare("UPDATE `slider` SET `photo`=? ,`heading`=?,`short_text`=? WHERE id=? ");

    $stmt->execute([$img,$_POST['heading'],$_POST['short_text'],$_POST['id']]);
    $_SESSION['update'] = "update";

    header("location:../manage_slider.php");
}

	
	

		if (isset($_GET['id'])) 
		{
$stmt = $conn->prepare("UPDATE `slider` SET delete_status='1' where id='".$_GET['id']."' ");

			$stmt->execute();
			

			$_SESSION['delete']="delete";

			header("location:../manage_slider.php" ); 

		}





		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>
