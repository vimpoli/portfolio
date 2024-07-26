<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['statusBtn'])) {
    $msg_id = mysqli_real_escape_string($conn, $_GET['id']);
    $status = $_POST['statusBtn'];
    if ($status == '0') {
        $query = mysqli_query($conn, "UPDATE messages SET status='1' WHERE id='$msg_id' LIMIT 1");
        if ($query) {
            $_SESSION['success'] = 'User Unblocked';
            header('Location: ../view-messages');
            exit(0);
        }
    } else {
        $query = mysqli_query($conn, "UPDATE messages SET status='0' WHERE id='$msg_id' LIMIT 1");
        if ($query) {
            $_SESSION['success'] = 'User Blocked';
            header('Location: ../view-messages');
            exit(0);
        }
    }
}

if (isset($_POST['statusCmntBtn'])) {
    $msg_id = mysqli_real_escape_string($conn, $_GET['id']);
    $status = $_POST['statusCmntBtn'];
    if ($status == '0') {
        $query = mysqli_query($conn, "UPDATE comments SET status='1' WHERE id='$msg_id' LIMIT 1");
        if ($query) {
            $_SESSION['success'] = 'Public';
            header('Location: ../view-comments');
            exit(0);
        }
    } else {
        $query = mysqli_query($conn, "UPDATE comments SET status='0' WHERE id='$msg_id' LIMIT 1");
        if ($query) {
            $_SESSION['success'] = 'Hidden';
            header('Location: ../view-comments');
            exit(0);
        }
    }
}

if (isset($_POST['del_message_btn'])) {
    $msg_id = mysqli_real_escape_string($conn, $_POST['del_message_btn']);

    $query = mysqli_query($conn, "DELETE FROM messages WHERE id='$msg_id'");
    if (!$query) {
        $_SESSION['failure'] = 'Deletion Failed';
        header('Location: ../view-messages');
        exit(0);
    } else {
        $_SESSION['success'] = 'Deletion successful';
        header('Location: ../view-messages');
        exit(0);
    }
}

if (isset($_POST['del_comment_btn'])) {
    $cmnt_id = mysqli_real_escape_string($conn, $_POST['del_comment_btn']);

    $query = mysqli_query($conn, "DELETE FROM comments WHERE id='$cmnt_id'");
    if (!$query) {
        $_SESSION['failure'] = 'Deletion Failed';
        header('Location: ../view-comments');
        exit(0);
    } else {
        $_SESSION['success'] = 'Deletion successful';
        header('Location: ../view-comments');
        exit(0);
    }
}
