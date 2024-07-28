<?php
session_start();
include('../dashboard/config/dbconn.php');

if (isset($_POST['logout_btn'])) {
    try {

        $user_id = $_SESSION['auth_user']['user_id'];

        unset($_SESSION['auth']);
        unset($_SESSION['auth_role']);
        unset($_SESSION['auth_user']);

        $_SESSION['success'] = 'Logged out successfully';
        header("Location: ../login");
        exit(0);
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}
