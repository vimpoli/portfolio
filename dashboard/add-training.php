<?php
$title = 'Dashboard - Add Training';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Trainings</li>
                <li class="breadcrumb-item text-dark">Add</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="btn btn-sm btn-primary text-decoration-none fw-bold float-end" href="view-trainings">Trainings</a>
                </div>
                <div class="card-body">
                    <form action="controllers/trainingcode" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label>Training Name</label>
                                <input class="form-control" type="text" name="trn_name" placeholder="e.g wordpress" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Institute Name</label>
                                <input class="form-control" type="text" name="inst_name" placeholder="e.g nrb" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Start Date</label>
                                <input class="form-control" type="date" name="start_date" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Completion Date</label>
                                <input class="form-control" type="date" name="end_date">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="form-control" name="trn_desc" id="summernote" placeholder="Description of this training"></textarea>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status">
                            </div>
                        </div>
                        <hr class="pt-1 bg-secondary">
                        <button class="btn btn-sm btn-primary float-end" type="submit" name="add_training_btn" value="<?= $_SESSION['auth_user']['user_id'] ?>">Save</button>
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