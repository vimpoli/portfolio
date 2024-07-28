<?php
include('../config/dbconn.php');

if (isset($_POST['del_experience_btn'])) {
    try {
        $exp_id = mysqli_real_escape_string($conn, $_POST['del_experience_btn']);

        $delete_query = mysqli_query($conn, "DELETE FROM experiences WHERE id='$exp_id'");

        if ($delete_query) {
            $_SESSION['success'] = 'Deleted Successfully';
            header('Location: ../view-experiences');
            exit(0);
        } else {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../view-experiences');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['update_experience_btn'])) {
    try {
        $exp_id = mysqli_real_escape_string($conn, $_POST['exp_id']);

        $exp_field = mysqli_real_escape_string($conn, $_POST['designation']);
        $cmp_name = mysqli_real_escape_string($conn, $_POST['cmp_name']);
        $start_year = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_year = mysqli_real_escape_string($conn, $_POST['end_date']);
        $desc = mysqli_real_escape_string($conn, $_POST['designation_desc']);
        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $exp_edit_query = mysqli_query($conn, "UPDATE experiences SET designation='$exp_field',company_name='$cmp_name',description='$desc',start_date='$start_year',end_date='$end_year',status='$status' WHERE id='$exp_id' LIMIT 1");

        if ($exp_edit_query) {
            $_SESSION['success'] = 'Updated Successfully';
            header('Location: ../edit-experience?id=' . $exp_id);
            exit(0);
        } else {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../edit-experience?id=' . $exp_id);
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['experience_visibility_btn'])) {
    try {
        $status = $_POST['experience_visibility_btn'];
        $exp_id = $_GET['id'];
        if ($status == '1') {
            $query = mysqli_query($conn, "UPDATE experiences SET status='0' WHERE id='$exp_id' LIMIT 1");
            $_SESSION['success'] = 'Experience is hidden';
            header('Location: ../view-experiences');
            exit(0);
        } else {
            $query = mysqli_query($conn, "UPDATE experiences SET status='1' WHERE id='$exp_id' LIMIT 1");
            $_SESSION['success'] = 'Experience is visible';
            header('Location: ../view-experiences');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['add_experience_btn'])) {
    try {
        $user_id = mysqli_real_escape_string($conn, $_POST['add_experience_btn']);
        $exp_field = mysqli_real_escape_string($conn, $_POST['designation']);
        $cmp_name = mysqli_real_escape_string($conn, $_POST['cmp_name']);
        $start_year = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_year = mysqli_real_escape_string($conn, $_POST['end_date']);
        $desc = mysqli_real_escape_string($conn, $_POST['designation_desc']);
        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $exp_add_query = mysqli_query($conn, "INSERT INTO experiences (user_id,designation,company_name,description,start_date,end_date,status) VALUES ('$user_id','$exp_field','$cmp_name','$desc','$start_year','$end_year','$status')");

        if ($exp_add_query) {
            $_SESSION['success'] = 'Added Successfully';
            header('Location: ../view-experiences');
            exit(0);
        } else {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../add-experiences');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}
