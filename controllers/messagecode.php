<?php
session_start();
include('../dashboard/config/dbconn.php');

if (isset($_POST['send_msg_btn'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_msg = mysqli_real_escape_string($conn, $_POST['message']);
    $msg_query = mysqli_query($conn, "INSERT INTO messages (name,email,message) VALUES ('$user_name','$user_email','$user_msg')");

    if ($msg_query) {
        $_SESSION['success'] = 'Your message is sent successfully';
        header('Location: ../');
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../');
        exit(0);
    }
}
