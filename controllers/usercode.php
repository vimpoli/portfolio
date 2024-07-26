<?php
session_start();
include('../dashboard/config/dbconn.php');

if (isset($_POST['profile_update_btn'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['profile_update_btn']);
    $old_profile = mysqli_real_escape_string($conn, $_POST['old_profile']);
    $new_profile = mysqli_real_escape_string($conn, $_FILES['profile']['name']);
    $profile = '';

    if ($new_profile != NULL) {
        $image_name = pathinfo($new_profile, PATHINFO_FILENAME);
        $image_extension = pathinfo($new_profile, PATHINFO_EXTENSION);
        $profile = $image_name . '-' . date('Ymd') . '.' . $image_extension;
    } else {
        $profile = $old_profile;
    }

    $query = mysqli_query($conn, "UPDATE users SET profile='$profile' WHERE id='$user_id' LIMIT 1");

    if ($query) {
        if ($new_profile != NULL) {
            if (file_exists('../uploads/profiles/' . $old_profile)) {
                unlink('../uploads/profiles/' . $old_profile);
            }
            move_uploaded_file($_FILES['profile']['tmp_name'], '../uploads/profiles/' . $profile);
        }
        $_SESSION['success'] = 'Profile Updated';
        header('Location: ../profile');
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../profile');
        exit(0);
    }
}
