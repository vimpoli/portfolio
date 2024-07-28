<?php
session_start();
include('../dashboard/config/dbconn.php');

if (isset($_POST['register_btn'])) {
    try {
        $f_name = mysqli_real_escape_string($conn, $_POST['fname']);
        $l_name = mysqli_real_escape_string($conn, $_POST['lname']);
        $user_name = $f_name . " " . $l_name;
        $ph = mysqli_real_escape_string($conn, $_POST['phone']);
        $addr = mysqli_real_escape_string($conn, $_POST['address']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $c_password = mysqli_real_escape_string($conn, md5($_POST['c_password']));

        if ($password == $c_password) {
            //check email
            $check_email_query = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");

            if (mysqli_num_rows($check_email_query) > 0) {
                $_SESSION['failure'] = 'User already registerd with this email';
                header('Location: ../register');
                exit(0);
            } else {
                $add_query = mysqli_query($conn, "INSERT INTO users (name,phone,address,email,password) VALUES ('$user_name','$ph','$addr','$email','$password')");
                if ($add_query) {
                    $_SESSION['success'] = 'Registration successful. Login to continue';
                    header('Location: ../login');
                    exit(0);
                } else {
                    $_SESSION['failure'] = 'Something went wrong';
                    header('Location: ../register');
                    exit(0);
                }
            }
        } else {
            $_SESSION['failure'] = 'Passwords do not match';
            header('Location: ../register');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}
