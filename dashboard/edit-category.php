<?php
$title = 'Dashboard - Edit Category';

include('includes/header.php');
if ($_SESSION['auth_role'] == '1') :
?>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Categories</li>
                <li class="breadcrumb-item text-dark">Edit</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a href="view-categories" class="btn btn-sm btn-primary float-end">Categories</a>
                </div>
                <div class="card-body">
                    <?php
                    $cat_id = mysqli_real_escape_string($conn, $_GET['id']);
                    $query = mysqli_query($conn, "SELECT * FROM categories WHERE id='$cat_id' LIMIT 1");
                    if (mysqli_num_rows($query) > 0) {
                        $data = mysqli_fetch_array($query);
                    ?>
                        <form action="controllers/categorycode" method="POST">
                            <input type="hidden" name="cat_id" value="<?= $cat_id ?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Category</label>
                                    <input class="form-control" type="text" name="name" value="<?= $data['category'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Slug (URL)</label>
                                    <input class="form-control" type="text" name="slug" value="<?= $data['slug'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Description</label>
                                    <textarea name="description" rows="4" class="form-control"><?= $data['description'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Title</label>
                                    <input class="form-control" type="text" name="metatitle" value="<?= $data['meta_title'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="metadesc" rows="4" class="form-control"><?= $data['meta_description'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="metakey" rows="4" class="form-control"><?= $data['meta_keyword'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Navbar Status</label><br>
                                    <input type="checkbox" name="navstatus" width="70px" height="70px" <?= $data['navbar_status'] == '1' ? 'checked' : '' ?>>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status" width="70px" height="70px" <?= $data['status'] == '1' ? 'checked' : '' ?>>
                                </div>
                            </div>
                            <hr class="pt-1 bg-secondary">
                            <button type="submit" class="btn btn-sm btn-primary float-end" name="edit_category_btn">Update</button>
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