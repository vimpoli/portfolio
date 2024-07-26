<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['del_note_btn'])) {
    $note_id = mysqli_real_escape_string($conn, $_POST['del_note_btn']);

    $note = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM notes WHERE id='$note_id' LIMIT 1"));
    $note_to_del = $note['note'];

    $file_query = mysqli_query($conn, "DELETE FROM notes WHERE id='$note_id' LIMIT 1");

    if ($file_query) {
        if (file_exists('../../uploads/notes/' . $note_to_del)) {
            unlink('../../uploads/notes/' . $note_to_del);
        }
        $_SESSION['success'] = 'Deleted successfully';
        header('Location: ../view-notes');
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../view-notes');
        exit(0);
    }
}

if (isset($_POST['update_note_btn'])) {
    $note_id = mysqli_real_escape_string($conn, $_POST['note_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    $old_file = mysqli_real_escape_string($conn, $_POST['old_note']);
    $new_file = mysqli_real_escape_string($conn, $_FILES['new_note']['name']);
    $note_file = '';

    if ($new_file != NULL) {
        $file_name = pathinfo($new_file, PATHINFO_FILENAME);
        $file_ext = pathinfo($new_file, PATHINFO_EXTENSION);
        $note_file = $file_name . '-' . date('Ymd') . '.' . $file_ext;
    } else {
        $note_file = $old_file;
    }

    $meta_title = $_POST['metatitle'];
    $meta_description = $_POST['metadesc'];
    $meta_keyword = $_POST['metakey'];

    $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

    $update_query = mysqli_query($conn, "UPDATE notes SET title='$title',note='$note_file',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',status='$status' WHERE id='$note_id'");
    if ($update_query) {
        if ($new_file != NULL) {
            if (file_exists('../../uploads/notes/' . $old_file)) {
                unlink('../../uploads/notes/' . $old_file);
            }
            move_uploaded_file($_FILES['new_note']['tmp_name'], '../../uploads/notes/' . $note_file);
        }
        $_SESSION['success'] = 'Updated successfully';
        header('Location: ../edit-note?id=' . $note_id);
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../edit-note?id=' . $note_id);
        exit(0);
    }
}

if (isset($_POST['note_visibility_btn'])) {
    $status = $_POST['note_visibility_btn'];
    $note_id = $_GET['id'];
    if ($status == '1') {
        $query = mysqli_query($conn, "UPDATE notes SET status='0' WHERE id='$note_id' LIMIT 1");
        $_SESSION['success'] = 'Note is hidden';
        header('Location: ../view-notes');
        exit(0);
    } else {
        $query = mysqli_query($conn, "UPDATE notes SET status='1' WHERE id='$note_id' LIMIT 1");
        $_SESSION['success'] = 'Note is visible';
        header('Location: ../view-notes');
        exit(0);
    }
}


if (isset($_POST['add_note_btn'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    $file = mysqli_real_escape_string($conn, $_FILES['note']['name']);
    $file_name = pathinfo($file, PATHINFO_FILENAME);
    $file_ext = pathinfo($file, PATHINFO_EXTENSION);
    $note_file = $file_name . '-' . date('Ymd') . '.' . $file_ext;

    $meta_title = $_POST['metatitle'];
    $meta_description = $_POST['metadesc'];
    $meta_keyword = $_POST['metakey'];

    $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

    $add_query = mysqli_query($conn, "INSERT INTO notes (author,title,note,meta_title,meta_description,meta_keyword,status) VALUES ('$user_name','$title','$note_file','$meta_title','$meta_description','$meta_keyword','$status')");

    if ($add_query) {
        if ($file != NULL) {
            move_uploaded_file($_FILES['note']['tmp_name'], '../../uploads/notes/' . $note_file);
        }
        $_SESSION['success'] = 'Added successfully';
        header('Location: ../view-notes');
        exit(0);
    } else {
        $_SESSION['failure'] = 'Something went wrong';
        header('Location: ../add-note');
        exit(0);
    }
}
