<?php
session_start();
include '../../assets/constant/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../assets/mail/PHPMailer/src/Exception.php';
require '../../../assets/mail/PHPMailer/src/PHPMailer.php';
require '../../../assets/mail/PHPMailer/src/SMTP.php';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




    if (isset($_POST['submit'])) {

        $stmt = $conn->prepare("INSERT INTO `registration`(`name`,`email`, `message`, `address`, `education`,  `age`, `phone`, `wapp_no`, `service`, `total`, `tra_date`, `tra_id`, `emp_name`, `emp_phone`, `ma_name`, `ma_phone`, `date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");


        $stmt->execute([$_POST['name'], $_POST['email'], $_POST['message'], $_POST['address'], $_POST['education'], $_POST['age'], $_POST['phone'], $_POST['wapp_no'], $_POST['service'], $_POST['total'], $_POST['tra_date'], $_POST['tra_id'], $_POST['emp_name'], $_POST['emp_phone'], $_POST['ma_name'], $_POST['ma_phone'], $_POST['date']]);


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


        $msg1 = "Dear " . $_POST['name'] . " , <br>
        We are delighted to inform you that your registration has been successfully completed. <br>

        If you have any questions or need further assistance, please don't hesitate to contact our support team at herambsservices@gmail.com. <br>
        
        Best regards, <br>

 Thank You!! <br>
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
        $mail->addAddress($_POST['email']);



        $mail->isHTML(true);
        $mail->Subject = 'Message For Herambs Group of Services | Herambs Group of Services website on ' . $dt;
        $mail->Body    = $msg1;
        $mail->AltBody = $msg1;

        if ($mail->send())
            // email end


        header("location:../../../register.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
