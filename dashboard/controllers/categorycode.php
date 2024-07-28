<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['add_category_btn'])) {
    try {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $slug = preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '-', mysqli_real_escape_string($conn, $_POST['slug'])));
        $desc = mysqli_real_escape_string($conn, $_POST['description']);
        $meta_title = mysqli_real_escape_string($conn, $_POST['metatitle']);
        $meta_desc = mysqli_real_escape_string($conn, $_POST['metadesc']);
        $meta_key = mysqli_real_escape_string($conn, $_POST['metakey']);
        $nav_status = mysqli_real_escape_string($conn, $_POST['nav_status'] == true ? '1' : '0');
        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $query = mysqli_query($conn, "INSERT INTO categories (category,slug,description,meta_title,meta_description,meta_keyword,navbar_status,status)  VALUES ('$name','$slug','$desc','$meta_title','$meta_desc','$meta_key','$nav_status','$status')");

        if (!$query) {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../add-category');
            exit(0);
        } else {
            $_SESSION['success'] = 'Addition successful';
            header('Location: ../view-categories');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['edit_category_btn'])) {
    try {
        $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $slug = preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '-', mysqli_real_escape_string($conn, $_POST['slug'])));
        $desc = mysqli_real_escape_string($conn, $_POST['description']);
        $meta_title = mysqli_real_escape_string($conn, $_POST['metatitle']);
        $meta_desc = mysqli_real_escape_string($conn, $_POST['metadesc']);
        $meta_key = mysqli_real_escape_string($conn, $_POST['metakey']);
        $nav_status = mysqli_real_escape_string($conn, $_POST['navstatus'] == true ? '1' : '0');
        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $query = mysqli_query($conn, "UPDATE categories SET category='$name',slug='$slug',description='$desc',meta_title='$meta_title',meta_description='$meta_desc',meta_keyword='$meta_key',navbar_status='$nav_status',status='$status' WHERE id='$cat_id' LIMIT 1");

        if (!$query) {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../edit-category?id=' . $cat_id);
            exit(0);
        } else {
            $_SESSION['success'] = 'Update successful';
            header('Location: ../edit-category?id=' . $cat_id);
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['move_trash_btn'])) {
    try {
        $cat_id = mysqli_real_escape_string($conn, $_POST['move_trash_btn']);

        $query = mysqli_query($conn, "UPDATE categories SET status='2' WHERE id='$cat_id' LIMIT 1");

        if (!$query) {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../view-categories');
            exit(0);
        } else {
            $_SESSION['success'] = 'Moved to bin';
            header('Location: ../view-categories');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['restore_category_btn'])) {
    try {
        $cat_id = mysqli_real_escape_string($conn, $_POST['restore_category_btn']);

        $query = mysqli_query($conn, "UPDATE categories SET status='1' WHERE id='$cat_id' LIMIT 1");

        if (!$query) {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../view-trashes');
            exit(0);
        } else {
            $_SESSION['success'] = 'Restored successfully';
            header('Location: ../view-categories');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['del_category_btn'])) {
    try {
        $cat_id = mysqli_real_escape_string($conn, $_POST['del_category_btn']);

        $query = mysqli_query($conn, "DELETE FROM categories WHERE id='$cat_id' LIMIT 1");

        if (!$query) {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../view-trashes');
            exit(0);
        } else {
            $_SESSION['success'] = 'Deletion successful';
            header('Location: ../view-trashes');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['catgStatusBtn'])) {
    try {
        $cat_id = mysqli_real_escape_string($conn, $_GET['id']);
        $cat_status = mysqli_real_escape_string($conn, $_POST['catgStatusBtn']);

        if ($cat_status == '0') {
            $query = mysqli_query($conn, "UPDATE categories SET status='1' WHERE id='$cat_id' LIMIT 1");
            $_SESSION['success'] = 'Category shown';
            header('Location: ../view-categories');
            exit(0);
        } else {
            $query = mysqli_query($conn, "UPDATE categories SET status='0' WHERE id='$cat_id' LIMIT 1");
            $_SESSION['success'] = 'Category hidden';
            header('Location: ../view-categories');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['catgNavbarStatusBtn'])) {
    try {
        $cat_id = mysqli_real_escape_string($conn, $_GET['id']);
        $cat_nav_status = mysqli_real_escape_string($conn, $_POST['catgNavbarStatusBtn']);

        if ($cat_nav_status == '0') {
            $query = mysqli_query($conn, "UPDATE categories SET navbar_status='1' WHERE id='$cat_id' LIMIT 1");
            $_SESSION['success'] = 'Navbar Status Visible';
            header('Location: ../view-categories');
            exit(0);
        } else {
            $query = mysqli_query($conn, "UPDATE categories SET navbar_status='0' WHERE id='$cat_id' LIMIT 1");
            $_SESSION['success'] = 'Navbar Status Hidden';
            header('Location: ../view-categories');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}
