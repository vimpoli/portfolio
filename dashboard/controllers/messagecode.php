<?php
include('../config/dbconn.php');

if (isset($_POST['del_message_btn'])) {
    $msg_id = mysqli_real_escape_string($conn, $_POST['del_message_btn']);

    $delete_query = mysqli_query($conn, "DELETE FROM messages WHERE id='$msg_id'");
    if ($delete_query) {
        $_SESSION['success'] = 'Deleted Successfully';
        header('Location: ../view-messages');
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../view-messages');
        exit(0);
    }
}

