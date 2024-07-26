<?php
include('includes/header.php');
if ($_SESSION['auth_role'] == '1' || $_SESSION['auth_role']  == '2') :
?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item active">Posts</li>
                    <li class="breadcrumb-item text-dark">Add</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a href="view-posts" class="btn btn-sm btn-primary float-end">Posts</a>
                    </div>
                    <div class="card-body">
                        <form action="controllers/postcode" method="POST" enctype="multipart/form-data">
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
                                                <option value="<?= $categories['id'] ?>"><?= $categories['category'] ?></option>
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
                                    <input class="form-control" type="text" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Slug (URL)</label>
                                    <input class="form-control" type="text" name="slug" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea id="summernote" name="description" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Featured Image</label><br>
                                    <input type="file" name="post_img" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Title</label>
                                    <input class="form-control" type="text" name="metatitle" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="metadesc" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="metakey" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status" width="70px" height="70px">
                                </div>
                            </div>
                            <hr class="pt-1 bg-secondary">
                            <button type="submit" class="btn btn-sm btn-primary float-end" name="add_post_btn">Save</button>
                        </form>
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