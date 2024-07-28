<?php
include('../config/dbconn.php');

if (isset($_POST['del_training_btn'])) {
    try {
        $trn_id = mysqli_real_escape_string($conn, $_POST['del_training_btn']);

        $delete_query = mysqli_query($conn, "DELETE FROM trainings WHERE id='$trn_id'");
        if ($delete_query) {
            $_SESSION['success'] = 'Deleted Successfully';
            header('Location: ../view-trainings');
            exit(0);
        } else {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../view-trainings');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['update_training_btn'])) {
    try {
        $trn_id = mysqli_real_escape_string($conn, $_POST['trn_id']);

        $training_name = mysqli_real_escape_string($conn, $_POST['trn_name']);
        $institute_name = mysqli_real_escape_string($conn, $_POST['inst_name']);
        $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
        $desc = mysqli_real_escape_string($conn, $_POST['trn_desc']);
        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $edit_query = mysqli_query($conn, "UPDATE  trainings SET name='$training_name', institution='$institute_name', start_date='$start_date', end_date='$end_date', description='$desc', status='$status' WHERE id='$trn_id' LIMIT 1");
        if ($edit_query) {
            $_SESSION['success'] = 'Updated Successfully';
            header('Location: ../edit-training?id=' . $trn_id);
            exit(0);
        } else {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../edit-training?id=' . $trn_id);
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['training_visibility_btn'])) {
    try {
        $status = $_POST['training_visibility_btn'];
        $trn_id = $_GET['id'];

        if ($status == '1') {
            $query = mysqli_query($conn, "UPDATE trainings SET status='0' WHERE id='$trn_id' LIMIT 1");
            $_SESSION['success'] = 'Training is hidden';
            header('Location: ../view-trainings');
            exit(0);
        } else {
            $query = mysqli_query($conn, "UPDATE trainings SET status='1' WHERE id='$trn_id' LIMIT 1");
            $_SESSION['success'] = 'Training is visible';
            header('Location: ../view-trainings');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['add_training_btn'])) {
    try {
        $user_id = mysqli_real_escape_string($conn, $_POST['add_training_btn']);

        $training_name = mysqli_real_escape_string($conn, $_POST['trn_name']);
        $institute_name = mysqli_real_escape_string($conn, $_POST['inst_name']);
        $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
        $desc = mysqli_real_escape_string($conn, $_POST['trn_desc']);
        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $add_query = mysqli_query($conn, "INSERT INTO trainings(user_id,name,institution,start_date,end_date,description,status) VALUES ('$user_id','$training_name','$institute_name','$start_date','$end_date','$desc','$status')");
        if ($add_query) {
            $_SESSION['success'] = 'Added Successfully';
            header('Location: ../view-trainings');
            exit(0);
        } else {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../add-training');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}
