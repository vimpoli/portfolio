<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['statusCmntBtn'])) {
    try {
        $comment_id = mysqli_real_escape_string($conn, $_GET['id']);
        $status = $_POST['statusCmntBtn'];
        if ($status == '0') {
            $query = mysqli_query($conn, "UPDATE comments SET status='1' WHERE id='$comment_id' LIMIT 1");
            if ($query) {
                $_SESSION['success'] = 'Public';
                header('Location: ../view-comments');
                exit(0);
            }
        } else {
            $query = mysqli_query($conn, "UPDATE comments SET status='0' WHERE id='$comment_id' LIMIT 1");
            if ($query) {
                $_SESSION['success'] = 'Hidden';
                header('Location: ../view-comments');
                exit(0);
            }
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['del_comment_btn'])) {
    try {
        $comment_id = mysqli_real_escape_string($conn, $_POST['del_comment_btn']);

        $query = mysqli_query($conn, "DELETE FROM comments WHERE id='$comment_id'");
        if (!$query) {
            $_SESSION['failure'] = 'Deletion Failed';
            header('Location: ../view-comments');
            exit(0);
        } else {
            $_SESSION['success'] = 'Deletion successful';
            header('Location: ../view-comments');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}
