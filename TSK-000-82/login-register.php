
<?php
// Database Connection
require("config.php");

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class sendEmail
{
    function send($email, $v_code)
    {
        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'example@gmail.com'; // Enter your email
            $mail->Password = '000000'; // Enter your email password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->isHTML(true);

            $mail->setFrom('example@gmail.com', "Verify Email"); // Set Sender Email
            $mail->addAddress($email);

            $mail->Subject = 'Email verification';
            $mail->Body = 'Please click this button to verify your account: <a href="http://localhost/userauth/verify.php?Email=' . $email . '&v_code=' . $v_code . '">Verify</a>';

            $mail->send();
            echo '<script>alert("Almost Registration complete! Check Verification Email"); window.location.href="index.php";</script>';
            exit;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

$sendMl = new sendEmail();

// Register
if (isset($_POST["register"])) {
    $password = $_POST["password"];
    $v_code = bin2hex(random_bytes(16));

    $Name = $_POST["fullname"];
    $email = $_POST["email"];

    $insert_query = "INSERT INTO `users`(`FullName`, `Email`, `password`, `v_code`, `is_verified`) 
    VALUES ('$Name','$email','$password','$v_code','0')";

    if (mysqli_query($conn, $insert_query)) {
        $sendMl->send($email, $v_code);
        echo '<script>alert("Almost Registration complete! Check Verification Email");
        window.location.href="index.php";
        </script>';
    } else {
        echo '<script>alert("Something went wrong");</script>';
    }
}
// END Register Account Php

//----------------------

// login account php
if (isset($_POST['login'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $g_email = $_POST['email'];
        $g_password = $_POST['password'];

        $query = "SELECT * FROM `users` WHERE `Email`='$g_email' AND `password`='$g_password' AND `is_verified` = 1;";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $_SESSION['n'] = $row['FullName'];
            $_SESSION['e'] = $row['Email'];
            $_SESSION['p'] = $row['password'];
            echo "<script>alert('You are Logged in'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Invalid email or password'); window.location.href='index.php';</script>";
        }
    }
}

?>