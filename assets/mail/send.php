<?php include('../../panel/assets/constant/config.php'); ?>
<link rel="stylesheet" href="../css/popup_style.css">

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>

<?php

//contact email

if (isset($_POST['submit'])) {


    if (isset($_POST['g-recaptcha-response'])) {

        $stmt1 = $conn->prepare("SELECT * FROM `manage_web` ");
        $stmt1->execute();
        $record1 = $stmt1->fetchAll();
        foreach ($record1 as $key1) {

            $secretekey = $key1['secretkey'];
        }
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = $_POST['g-recaptcha-response'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretekey&response=$response&remoteip=$ip";
        $fire = file_get_contents($url);
        $data = json_decode($fire);
        if ($data->success == true) {

            $stmt = $conn->prepare("INSERT INTO `contactus`(`name`, `email`, `message`, `subject`, `phone`) VALUES ( '" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['message'] . "','" . $_POST['subject'] . "','" . $_POST['phone'] . "')");
            $stmt->execute();

            // print_r($stmt);
            // exit;

            // email start
            $stmt = $conn->prepare("SELECT * FROM emailsetting");
            $stmt->execute();
            $result = $stmt->fetchAll();
            //print_r($result);
            foreach ($result as $row) {

                $smtp_server = $row['smtp_server'];
                $smtp_password = $row['smtp_password'];
                $smtp_enc = $row['smtp_type'];
                $smtp_username = $row['smtp_username'];
                $smtp_port = $row['stmp_port'];
                $email = $row['email'];
            }

            $dt = date('Y-m-d H:i:s');

            $msg1 = "Dear Admin, <br>
    You Have new message from <br> 
    Name: <strong>" . $_POST['name'] . "</strong>  <br>
    Email: <strong>" . $_POST['email'] . " </strong> <br>
    Message: <strong>" . $_POST['message'] . "</strong> <br>
    Subject: <strong>" . $_POST['subject'] . "</strong> <br>
    Phone: <strong>" . $_POST['phone'] . "</strong> <br>
     ";

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host       = $smtp_server;
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtp_username;
            $mail->Password   = $smtp_password;
            $mail->SMTPSecure = $smtp_enc;
            $mail->Port       = $smtp_port;

            $mail->setFrom($smtp_username);
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Message For Herambs Group of Services | Herambs Group of Services website on ' . $dt;
            $mail->Body    = $msg1;
            $mail->AltBody = $msg1;

            if ($mail->send())
            // email end

            {

?>
                <div class="popup popup--icon -success js_success-popup popup--visible">
                    <div class="popup__background"></div>
                    <div class="popup__content">
                        <h3 class="popup__content__title">
                            Success
                        </h3>
                        <p> We have successfully received your Message and will get Back to you as soon as possible.</p>
                        <p>
                            <!-- <a href="login.php"><button class="button button--success" data-for="js_success-popup">OK</button></a> -->
                            <?php echo "<script>setTimeout(\"location.href = '../../index.php';\",1500);</script>"; ?>
                        </p>
                    </div>
                </div>
            <?php
            }
        } else {
            // echo "<script>alert('Something Went Wrong');
            //     window.location = (\"contact-us.php\")
            //     </script>";

            ?>
            <div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Error
                    </h3>
                    <p> Something Went Wrong.</p>
                    <p>
                        <!-- <a href="login.php"><button class="button button--success" data-for="js_success-popup">OK</button></a> -->
                        <?php echo "<script>setTimeout(\"location.href = '../../index.php';\",1500);</script>"; ?>
                    </p>
                </div>
            </div>
            <?php
        }
    }
}




//career email

if (isset($_POST['submit2'])) {

    $originalName = basename($_FILES['resume']['name']);
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    $newName = $_POST['name'] . rand(100, 999) . '.' . $extension;

    $filepath = "../../panel/assets/files/" . $newName;
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $filepath)) {

        $resume = $newName;
    } else {

        echo "Error !!";
    }


    if (isset($_POST['g-recaptcha-response'])) {

        $stmt1 = $conn->prepare("SELECT * FROM `manage_web` ");
        $stmt1->execute();
        $record1 = $stmt1->fetchAll();
        foreach ($record1 as $key1) {

            $secretekey = $key1['secretkey'];
        }
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = $_POST['g-recaptcha-response'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretekey&response=$response&remoteip=$ip";
        $fire = file_get_contents($url);
        $data = json_decode($fire);
        if ($data->success == true) {

            $stmt = $conn->prepare("INSERT INTO `career_info`(`name`, `phone`, `email`, `gender`, `position`, `resume`, `address`, `message`) VALUES ( '" . $_POST['name'] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "','" . $_POST['gender'] . "','" . $_POST['position'] . "','" . $resume . "','" . $_POST['address'] . "','" . $_POST['message'] . "')");
            $stmt->execute();

            // print_r($stmt);
            // exit;

            // email start
            $stmt = $conn->prepare("SELECT * FROM emailsetting");
            $stmt->execute();
            $result = $stmt->fetchAll();
            //print_r($result);
            foreach ($result as $row) {

                $smtp_server = $row['smtp_server'];
                $smtp_password = $row['smtp_password'];
                $smtp_enc = $row['smtp_type'];
                $smtp_username = $row['smtp_username'];
                $smtp_port = $row['stmp_port'];
                $email = $row['email'];
            }

            $dt = date('Y-m-d H:i:s');

            $resumePath = '../../panel/assets/files/' . $resume; // Replace with the path to your image

            $msg1 = "Dear Admin, <br>
    You Have new message from <br> 
    Name: <strong>" . $_POST['name'] . "</strong>  <br>
    Phone: <strong>" . $_POST['phone'] . " </strong> <br>
    Email: <strong>" . $_POST['email'] . "</strong> <br>
    Gender: <strong>" . $_POST['gender'] . "</strong> <br>
    Position: <strong>" . $_POST['position'] . "</strong> <br>
    Address: <strong>" . $_POST['address'] . "</strong> <br>
    Message: <strong>" . $_POST['message'] . "</strong> <br>
    Thank You!!
     ";

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host       = $smtp_server;
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtp_username;
            $mail->Password   = $smtp_password;
            $mail->SMTPSecure = $smtp_enc;
            $mail->Port       = $smtp_port;

            $mail->setFrom($smtp_username);
            $mail->addAddress($email);

            $mail->addAttachment($resumePath, $resume);       //for sending resume in email


            $mail->isHTML(true);
            $mail->Subject = 'Message For Herambs Group of Services | Herambs Group of Services website on ' . $dt;
            $mail->Body    = $msg1;
            $mail->AltBody = $msg1;

            if ($mail->send())
            // email end

            {

            ?>
                <div class="popup popup--icon -success js_success-popup popup--visible">
                    <div class="popup__background"></div>
                    <div class="popup__content">
                        <h3 class="popup__content__title">
                            Success
                        </h3>
                        <p> We have successfully received your Message and will get Back to you as soon as possible.</p>
                        <p>
                            <!-- <a href="login.php"><button class="button button--success" data-for="js_success-popup">OK</button></a> -->
                            <?php echo "<script>setTimeout(\"location.href = '../../career.php';\",1500);</script>"; ?>
                        </p>
                    </div>
                </div>
            <?php
            }
        } else {
            // echo "<script>alert('Something Went Wrong');
            //     window.location = (\"contact-us.php\")
            //     </script>";

            ?>
            <div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Error
                    </h3>
                    <p> Something Went Wrong.</p>
                    <p>
                        <!-- <a href="login.php"><button class="button button--success" data-for="js_success-popup">OK</button></a> -->
                        <?php echo "<script>setTimeout(\"location.href = '../../career.php';\",1500);</script>"; ?>
                    </p>
                </div>
            </div>
<?php
        }
    }
}


?>