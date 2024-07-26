<?php
$title = 'Dashboard - Edit Note';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Notes</li>
                <li class="breadcrumb-item text-dark">Edit</li>
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
                    $note_id = mysqli_real_escape_string($conn, $_GET['id']);
                    $query = mysqli_query($conn, "SELECT * FROM notes WHERE id='$note_id'");
                    if (mysqli_num_rows($query) > 0) {
                        $note_data = mysqli_fetch_array($query);
                    ?>
                        <form action="controllers/notecode" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="note_id" value="<?= $note_id ?>">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Title</label>
                                    <input class="form-control" name="title" value="<?= $note_data['title'] ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Upload Note</label> &mid; <?= pathinfo($note_data['note'], PATHINFO_FILENAME) ?>
                                    <input class="form-control" type="hidden" name="old_note" value="<?= $note_data['note'] ?>">
                                    <input class="form-control" type="file" name="new_note">
                                    <small class="text-muted">File formats: .jpg or .pdf &mid; Size: less than 1 MB</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Title</label>
                                    <input class="form-control" type="text" name="metatitle" value="<?= $note_data['meta_title'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="metadesc" rows="4" class="form-control"><?= $note_data['meta_description'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="metakey" rows="4" class="form-control"><?= $note_data['meta_keyword'] ?></textarea>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status" <?= $note_data['status'] == '1' ? 'checked' : '' ?>>
                                </div>
                            </div>
                            <hr class="pt-1 bg-secondary">
                            <button class="btn btn-sm btn-primary float-end" type="submit" name="update_note_btn">Update</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <h5 class="text-center">No Data Found</h5>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>