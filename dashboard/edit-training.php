<?php
$title = 'Dashboard - Edit Training';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Trainings</li>
                <li class="breadcrumb-item text-dark">Edit</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="btn btn-sm btn-primary text-decoration-none fw-bold float-end" href="view-trainings">Trainings</a>
                </div>
                <div class="card-body">
                    <?php
                    $trn_id = $_GET['id'];
                    $edit_query = mysqli_query($conn, "SELECT * FROM trainings WHERE id='$trn_id' LIMIT 1");

                    if (mysqli_num_rows($edit_query) > 0) {
                        $trn_data = mysqli_fetch_array($edit_query);

                    ?>
                        <form action="controllers/trainingcode" method="POST">
                            <input type="hidden" name="trn_id" value="<?= $trn_id ?>">
                            <div class="row my-3">
                                <div class="form-group col-md-6">
                                    <label>Training Name</label>
                                    <input class="form-control" type="text" name="trn_name" value="<?= $trn_data['name'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Institute Name</label>
                                    <input class="form-control" type="text" name="inst_name" value="<?= $trn_data['institution'] ?>">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="form-group col-md-6">
                                    <label>Start Year</label>
                                    <input class="form-control" type="date" name="start_date" value="<?= $trn_data['start_date'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Completion Year</label>
                                    <input class="form-control" type="date" name="end_date" value="<?= $trn_data['end_date'] ?>">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea class="form-control" id="summernote" name="trn_desc"><?= htmlentities($trn_data['description']) ?></textarea>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" <?= $trn_data['status'] == '1' ? 'checked' : '' ?>>
                                </div>
                            </div>
                            <hr class="pt-1 bg-secondary">
                            <button class="btn btn-sm btn-primary float-end" type="submit" name="update_training_btn">Update</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <h4>No Record Found</h4>
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