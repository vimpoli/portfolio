<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['del_education_btn'])) {
    try {
        $education_id = mysqli_real_escape_string($conn, $_POST['del_education_btn']);

        $edu_delete_query = mysqli_query($conn, "DELETE FROM qualifications WHERE id='$education_id'");

        if ($edu_delete_query) {
            $_SESSION['success'] = 'Deleted Successfully';
            header('Location: ../view-educations');
            exit(0);
        } else {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../view-educations');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['update_education_btn'])) {
    try {
        $education_id = mysqli_real_escape_string($conn, $_POST['edu_id']);

        $brd_uni = mysqli_real_escape_string($conn, $_POST['board_or_university']);
        $degree = mysqli_real_escape_string($conn, $_POST['level']);
        $college_name = mysqli_real_escape_string($conn, $_POST['college_name']);
        $desc = mysqli_real_escape_string($conn, $_POST['description']);
        $percent_or_gpa = mysqli_real_escape_string($conn, $_POST['percent_or_gpa']);
        $end_year = mysqli_real_escape_string($conn, $_POST['completion_year']);

        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $query = mysqli_query($conn, "UPDATE qualifications SET college_name='$college_name',level='$degree',description='$desc',completion_year='$end_year',board_or_university='$brd_uni',percentage_or_cgpa='$percent_or_gpa',status='$status' WHERE id='$education_id'");

        if ($query) {
            $_SESSION['success'] = 'Updated Successfully';
            header('Location: ../edit-education?id=' . $education_id);
            exit(0);
        } else {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: edit-education?id=' . $edcationucation_id);
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['education_visibility_btn'])) {
    try {
        $status = $_POST['education_visibility_btn'];
        $education_id = $_GET['id'];
        if ($status == '1') {
            $query = mysqli_query($conn, "UPDATE qualifications SET status='0' WHERE id='$education_id' LIMIT 1");
            $_SESSION['success'] = 'Education is hidden';
            header('Location: ../view-educations');
            exit(0);
        } else {
            $query = mysqli_query($conn, "UPDATE qualifications SET status='1' WHERE id='$education_id' LIMIT 1");
            $_SESSION['success'] = 'Education is visible';
            header('Location: ../view-educations');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['add_education_btn'])) {
    try {
        $user_id = mysqli_real_escape_string($conn, $_SESSION['auth_user']['user_id']);

        $brd_uni = mysqli_real_escape_string($conn, $_POST['board_or_university']);
        $degree = mysqli_real_escape_string($conn, $_POST['level']);
        $college_name = mysqli_real_escape_string($conn, $_POST['college_name']);
        $desc = mysqli_real_escape_string($conn, $_POST['description']);
        $percent_or_gpa = mysqli_real_escape_string($conn, $_POST['percent_or_gpa']);
        $end_year = mysqli_real_escape_string($conn, $_POST['completion_year']);

        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $edu_add_query = mysqli_query($conn, "INSERT INTO qualifications (user_id,college_name,level,description,completion_year,board_or_university,percentage_or_cgpa,status) VALUES ('$user_id','$college_name','$degree','$desc','$end_year','$brd_uni','$percent_or_gpa','$status')");

        if ($edu_add_query) {
            $_SESSION['success'] = 'Added Successfully';
            header('Location: ../view-educations');
            exit(0);
        } else {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../add-education');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}
