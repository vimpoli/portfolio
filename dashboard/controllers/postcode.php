<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['add_post_btn'])) {
    try {
        $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);

        $author = $_SESSION['auth_user']['user_name'];

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $slug = preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '-', mysqli_real_escape_string($conn, $_POST['slug'])));
        $desc = mysqli_real_escape_string($conn, $_POST['description']);

        $org_img = $_FILES['post_img']['name'];
        $img_name = pathinfo($org_img, PATHINFO_FILENAME);
        $img_ext = pathinfo($org_img, PATHINFO_EXTENSION);
        $post_img = date('m-d-Y') . '-' . $img_name . '.' . $img_ext;

        $meta_title = mysqli_real_escape_string($conn, $_POST['metatitle']);
        $meta_desc = mysqli_real_escape_string($conn, $_POST['metadesc']);
        $meta_key = mysqli_real_escape_string($conn, $_POST['metakey']);
        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $query = mysqli_query($conn, "INSERT INTO posts (category_id,author,title,slug,description,feature_img,meta_title,meta_description,meta_keyword,status) VALUES ('$cat_id','$author','$name','$slug','$desc','$post_img','$meta_title','$meta_desc','$meta_key','$status')");

        if (!$query) {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../add-post');
            exit(0);
        } else {
            move_uploaded_file($_FILES['post_img']['tmp_name'], '../../uploads/posts/' . $post_img);
            $_SESSION['success'] = 'Added successfully';
            header('Location: ../view-posts');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['edit_post_btn'])) {
    try {
        $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);

        $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);

        $slug = preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '-', mysqli_real_escape_string($conn, $_POST['slug'])));
        $desc = mysqli_real_escape_string($conn, $_POST['description']);

        $old_img = $_POST['old_img'];
        $org_img = $_FILES['post_img']['name'];
        $post_img = '';

        if ($org_img != NULL) {
            $img_name = pathinfo($org_img, PATHINFO_FILENAME);
            $img_ext = pathinfo($org_img, PATHINFO_EXTENSION);
            $post_img = date('m-d-Y') . '-' . $img_name . '.' . $img_ext;
        } else {
            $post_img = $old_img;
        }


        $meta_title = mysqli_real_escape_string($conn, $_POST['metatitle']);
        $meta_desc = mysqli_real_escape_string($conn, $_POST['metadesc']);
        $meta_key = mysqli_real_escape_string($conn, $_POST['metakey']);
        $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1' : '0');

        $query = mysqli_query($conn, "UPDATE posts SET category_id='$cat_id',title='$name',slug='$slug',description='$desc',feature_img='$post_img',meta_title='$meta_title',meta_description='$meta_desc',meta_keyword='$meta_key',status='$status' WHERE id='$post_id' LIMIT 1");

        if (!$query) {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../edit-post?id=' . $post_id);
            exit(0);
        } else {
            if ($old_img != NULL) {
                if (file_exists('../../uploads/posts/' . $org_img)) {
                    unlink('../../uploads/posts/' . $org_img);
                }
                move_uploaded_file($_FILES['post_img']['tmp_name'], '../../uploads/posts/' . $post_img);
            }
            $_SESSION['success'] = 'Updated successfully';
            header('Location: ../edit-post?id=' . $post_id);
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['del_post_btn'])) {
    try {
        $post_id = mysqli_real_escape_string($conn, $_POST['del_post_btn']);

        $res = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM posts WHERE id='$post_id' LIMIT 1"));
        $img_to_del = $res['image'];

        $query = mysqli_query($conn, "DELETE FROM posts WHERE id='$post_id' LIMIT 1");

        if (!$query) {
            $_SESSION['failure'] = 'Something went wrong';
            header('Location: ../view-posts');
            exit(0);
        } else {
            if (file_exists('../../uploads/posts/' . $img_to_del)) {
                unlink('../../uploads/posts/' . $img_to_del);
            }
            $_SESSION['success'] = 'Deleted successfully';
            header('Location: ../view-posts');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}

if (isset($_POST['postStatusBtn'])) {
    try {
        $post_id = mysqli_real_escape_string($conn, $_GET['id']);
        $post_status = mysqli_real_escape_string($conn, $_POST['postStatusBtn']);

        if ($post_status == '0') {
            $query = mysqli_query($conn, "UPDATE posts SET status='1' WHERE id='$post_id' LIMIT 1");
            $_SESSION['success'] = 'Post shown';
            header('Location: ../view-posts');
            exit(0);
        } else {
            $query = mysqli_query($conn, "UPDATE posts SET status='0' WHERE id='$post_id' LIMIT 1");
            $_SESSION['success'] = 'Post hidden';
            header('Location: ../view-posts');
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['failure'] = $th->getMessage();
        header('Location: ../500');
        exit(0);
    }
}
