<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['del_user_btn'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['del_user_btn']);

    $user_data = mysqli_fetch_array(mysqli_query($conn, "SELECT profile,resume FROM users WHERE id='$user_id' LIMIT 1"));
    $resume = $user_data['resume'];
    $profile = $user_data['profile'];

    $query1 = mysqli_query($conn, "DELETE FROM skills WHERE user_id='$user_id';");
    $query2 = mysqli_query($conn, "DELETE FROM qualifications WHERE user_id='$user_id'");
    $query3 = mysqli_query($conn, "DELETE FROM experiences WHERE user_id='$user_id'");
    $query4 = mysqli_query($conn, "DELETE FROM trainings WHERE user_id='$user_id'");
    $query5 = mysqli_query($conn, "DELETE FROM users WHERE id='$user_id'");

    if ($query1 && $query2 && $query3 && $query4 && $query5) {
        if (file_exists('../../uploads/profiles/' . $profile)) {
            unlink('../../uploads/profiles/' . $profile);
        }
        if (file_exists('../../uploads/cvs/' . $resume)) {
            unlink('../../uploads/cvs/' . $resume);
        }
        $_SESSION['success'] = 'Deleted Successfully';
        header('Location: ../view-users');
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../view-users');
        exit(0);
    }
}

if (isset($_POST['update_user_btn'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $user_name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

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

    $old_resume = mysqli_real_escape_string($conn, $_POST['old_resume']);
    $new_resume = mysqli_real_escape_string($conn, $_FILES['resume']['name']);
    $resume = '';

    if ($new_resume != NULL) {
        $cv_name = pathinfo($new_resume, PATHINFO_FILENAME);
        $cv_extension = pathinfo($new_resume, PATHINFO_EXTENSION);
        $resume = $cv_name . '-' . date('Ymd') . '.' . $cv_extension;
    } else {
        $resume = $old_resume;
    }
    $ph = mysqli_real_escape_string($conn, $_POST['phone']);
    $addr = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $old_pass = mysqli_real_escape_string($conn, $_POST['old_password']);
    $new_pass = mysqli_real_escape_string($conn, ($_POST['password']));
    $pass = '';

    if ($new_pass != NULL) {
        $pass = md5($new_pass);
    } else {
        $pass = $old_pass;
    }

    $role_as = mysqli_real_escape_string($conn, $_POST['role_as']);

    $update_query = mysqli_query($conn, "UPDATE users SET name='$user_name',profile='$profile',bio='$bio',resume='$resume',dob='$dob',phone='$ph',address='$addr',email='$email',password='$pass',role_as='$role_as' WHERE id='$user_id' LIMIT 1");

    if ($update_query) {
        if ($new_profile != NULL) {
            if (file_exists('../../uploads/profiles/' . $old_profile)) {
                unlink('../../uploads/profiles/' . $old_profile);
            }
            move_uploaded_file($_FILES['profile']['tmp_name'], '../../uploads/profiles/' . $profile);
        }
        if ($new_resume != NULL) {
            if (file_exists('../../uploads/cvs/' . $old_resume)) {
                unlink('../../uploads/cvs/' . $old_resume);
            }
            move_uploaded_file($_FILES['resume']['tmp_name'], '../../uploads/cvs/' . $resume);
        }
        $_SESSION['success'] = 'Updated Successfully';
        header('Location: ../edit-user?id=' . $user_id);
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../edit-user?id=' . $user_id);
        exit(0);
    }
}

if (isset($_POST['user_status_btn'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);
    $status = $_POST['user_status_btn'];
    if ($status == '0') {
        $query = mysqli_query($conn, "UPDATE users SET status='1' WHERE id='$user_id' LIMIT 1");
        if ($query) {
            $_SESSION['success'] = 'Activation successful';
            header('Location: ../view-users');
            exit(0);
        }
    } else {
        $query = mysqli_query($conn, "UPDATE users SET status='0' WHERE id='$user_id' LIMIT 1");
        if ($query) {
            $_SESSION['success'] = 'User blocked';
            header('Location: ../view-users');
            exit(0);
        }
    }
}

if (isset($_POST['add_user_btn'])) {
    $f_name = mysqli_real_escape_string($conn, $_POST['fname']);
    $l_name = mysqli_real_escape_string($conn, $_POST['lname']);
    $user_name = $f_name . " " . $l_name;
    $ph = mysqli_real_escape_string($conn, $_POST['phone']);
    $addr = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $c_password = mysqli_real_escape_string($conn, md5($_POST['cconfirm_password']));

    $role_as = mysqli_real_escape_string($conn, $_POST['role']);

    if ($password == $c_password) {

        $check_email_query = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");

        if (mysqli_num_rows($check_email_query) > 0) {
            $_SESSION['failure'] = 'User already registerd with this email';
            header('Location: ../add-user');
            exit(0);
        } else {
            $add_query = mysqli_query($conn, "INSERT INTO users (name,phone,address,email,password,role_as) VALUES ('$user_name','$ph','$addr','$email','$password','$role_as')");
            if ($add_query) {
                $_SESSION['success'] = 'Added successfully';
                header('Location: ../view-users');
                exit(0);
            } else {
                $_SESSION['failure'] = 'Something went wrong';
                header('Location: ../add-user');
                exit(0);
            }
        }
    } else {
        $_SESSION['msg'] = 'Passwords do not match';
        header('Location: ../add-user');
        exit(0);
    }
}
