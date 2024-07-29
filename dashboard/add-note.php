<?php
$title = 'Dashboard - Add Note';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Notes</li>
                <li class="breadcrumb-item text-dark">Add</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="btn btn-sm btn-primary text-decoration-none fw-bold float-end" href="view-notes">Notes</a>
                </div>
                <div class="card-body">
                    <?php
                    $user_name = $_SESSION['auth_user']['user_name'];
                    ?>
                    <form action="controllers/notecode" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_name" value="<?= $user_name ?>">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label>Title</label>
                                <input class="form-control" name="title">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Upload Note</label>
                                <input class="form-control" type="file" name="note">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" name="metatitle">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Description</label>
                                <textarea name="metadesc" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="metakey" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" name="status">
                            </div>
                        </div>
                        <hr class="pt-1 bg-secondary">
                        <button class="btn btn-sm btn-primary float-end" type="submit" name="add_note_btn">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>