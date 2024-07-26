<?php
$title = 'Dashboard - Add Category';

include('includes/header.php');
if ($_SESSION['auth_role'] == '1') :
?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item active">Categories</li>
                    <li class="breadcrumb-item text-dark">Add</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a href="view-categories" class="btn btn-sm btn-primary float-end">Categories</a>
                    </div>
                    <div class="card-body">
                        <form action="controllers/categorycode" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Category</label>
                                    <input class="form-control" type="text" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Slug (URL)</label>
                                    <input class="form-control" type="text" name="slug" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Description</label>
                                    <textarea name="description" rows="4" class="form-control"></textarea>
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
                                    <label>Navbar Status</label><br>
                                    <input type="checkbox" name="nav_status" width="70px" height="70px">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status" width="70px" height="70px">
                                </div>
                            </div>
                            <hr class="pt-1 bg-secondary">
                            <button type="submit" class="btn btn-sm btn-primary float-end" name="add_category_btn">Save</button>
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