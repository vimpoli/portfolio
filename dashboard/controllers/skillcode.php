<?php
include('../config/dbconn.php');

if (isset($_POST['del_skill_btn'])) {
    $skill_id = mysqli_real_escape_string($conn, $_POST['del_skill_btn']);

    $delete_query = mysqli_query($conn, "DELETE FROM skills WHERE id='$skill_id'");

    if ($delete_query) {
        $_SESSION['success'] = 'Deleted Successfully';
        header('Location: ../view-skills');
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../view-skills');
        exit(0);
    }
}

if (isset($_POST['update_skill_btn'])) {
    $skill_id = mysqli_real_escape_string($conn, $_POST['skill_id']);
    $skill = mysqli_real_escape_string($conn, $_POST['skill']);
    $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');
   
    $prof_edit_query = mysqli_query($conn, "UPDATE skill_tbl SET skill='$skill',status='$status' WHERE id='$skill_id'");

    if ($prof_edit_query) {
        $_SESSION['success'] = 'Updated Successfully';
        header('Location: ../edit-skill?id=' . $skill_id);
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../edit-skill?id=' . $skill_id);
        exit(0);
    }
}

if (isset($_POST['skill_visibility_btn'])) {
    $status = $_POST['skill_visibility_btn'];
    $skill_id = $_GET['id'];
    if ($status == '1') {
        $query = mysqli_query($conn, "UPDATE skills SET status='0' WHERE id='$skill_id' LIMIT 1");
        $_SESSION['success'] = 'Skill is hidden';
        header('Location: ../view-skills');
        exit(0);
    } else {
        $query = mysqli_query($conn, "UPDATE skills SET status='1' WHERE id='$skill_id' LIMIT 1");
        $_SESSION['success'] = 'Skill is visible';
        header('Location: ../view-skills');
        exit(0);
    }
}

if (isset($_POST['add_skill_btn'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $skill = mysqli_real_escape_string($conn, $_POST['skill']);
    $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

    $prof_add_query = mysqli_query($conn, "INSERT INTO skills (user_id,skill,status) VALUES ('$user_id','$skill','$status')");

    if ($prof_add_query) {
        $_SESSION['success'] = 'Added Successfully';
        header('Location: ../view-skills');
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../add-skill');
        exit(0);
    }
}
