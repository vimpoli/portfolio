<?php
$title = 'Dashboard - Edit Post';

include('includes/header.php');
if ($_SESSION['auth_role'] == '1' || $_SESSION['auth_role']) :
?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item active">Posts</li>
                    <li class="breadcrumb-item text-dark">Edit</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a href="view-posts" class="btn btn-sm btn-primary float-end">Posts</a>
                    </div>
                    <div class="card-body">
                        <?php
                        $post_id = mysqli_real_escape_string($conn, $_GET['id']);
                        $query = mysqli_query($conn, "SELECT * FROM posts WHERE id='$post_id' LIMIT 1");
                        if (mysqli_num_rows($query) > 0) {
                            $post = mysqli_fetch_array($query);
                        ?>
                            <form action="controllers/postcode" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="post_id" value="<?= $post_id ?>">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Category</label>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM categories WHERE status='1'");
                                        if (mysqli_num_rows($query) > 0) {
                                        ?>
                                            <select name="cat_id" class="form-control" required>
                                                <option value="">--Select Category--</option>
                                                <?php foreach ($query as $categories) { ?>
                                                    <option value="<?= $categories['id'] ?>" <?= $categories['id'] == $post['category_id'] ? 'selected' : '' ?>><?= $categories['category'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        <?php
                                        } else {
                                        ?>
                                            <h6>No Category Found</h6>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Post Title</label>
                                        <input class="form-control" type="text" name="name" value="<?= $post['title'] ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Slug (URL)</label>
                                        <input class="form-control" type="text" name="slug" value="<?= $post['slug'] ?>">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <textarea id="summernote" name="description" rows="4" class="form-control"><?= htmlentities($post['description']) ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Image</label>
                                        <input type="hidden" name="old_img" value="<?= $post['feature_img'] ?>">
                                        <input class="form-control" type="file" name="post_img">
                                        <small class="text-muted">Image View &mid; <?= $post['feature_img'] ?></small>
                                        <img class="w-100 mt-1 rounded" src="../uploads/posts/<?= $post['feature_img'] ?>" height="500px" alt="Post Image">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Meta Title</label>
                                        <input class="form-control" type="text" name="metatitle" value="<?= $post['meta_title'] ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Meta Description</label>
                                        <textarea name="metadesc" rows="4" class="form-control"><?= $post['meta_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Meta Keyword</label>
                                        <textarea name="metakey" rows="4" class="form-control"><?= $post['meta_keyword'] ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Status</label><br>
                                        <input type="checkbox" name="status" width="70px" height="70px" <?= $post['status'] == '1' ? 'checked' : '' ?>>
                                    </div>
                                </div>
                                <hr class="pt-1 bg-secondary">
                                <button type="submit" class="btn btn-sm btn-primary float-end" name="edit_post_btn">Update</button>
                            </form>

                        <?php
                        } else {
                        ?>
                            <h6 class="text-center">No Records Found</h6>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
endif;
include('includes/footer.php');
include('includes/scripts.php');
?>