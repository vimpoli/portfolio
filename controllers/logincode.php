<?php
session_start();
include('../dashboard/config/dbconn.php');

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $login_query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($login_query) > 0) {
        foreach ($login_query as $data) {
            $user_id = $data['id'];
            $user_name = $data['name'];
            $user_email = $data['email'];
            $role_as = $data['role_as'];
            $status = $data['status'];
        }
        if ($status == '0') {
            $_SESSION['failure'] = 'User is blocked due to rule break';
            header('Location: ../login');
            exit(0);
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' =>  $user_name,
            'user_email' => $user_email,
        ];

        if (isset($_SESSION['auth'])) {
            $_SESSION['success'] = "Welcome to Dashboard";
            header("Location: ../dashboard");
            exit(0);
        }
    } else {
        $_SESSION['failure'] = 'Invalid Credentials';
        header('Location: ../login');
        exit(0);
    }
} else {
    $_SESSION['failure'] = 'You are not allowed';
    header('Location: ../login');
    exit(0);
}
