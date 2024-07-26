<?php
session_start();
include('../dashboard/config/dbconn.php');

if (isset($_POST['user_comment_btn'])) {
    $slug = $_POST['slug'];
    $post_id = $_POST['post_id'];
    $name = $_POST['name'];
    $cmnt = mysqli_real_escape_string($conn, $_POST['comment']);


    $query = mysqli_query($conn, "INSERT INTO comments (post_id,name,comment) VALUES ('$post_id','$name','$cmnt')");

    if (!$query) {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../post/' . $slug);
        exit(0);
    } else {
        $_SESSION['success'] = 'Posted successfully';
        header('Location: ../post/' . $slug);
        exit(0);
    }
}

?>