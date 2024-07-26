<?php
$title = 'Dashboard - Edit Experience';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Experiences</li>
                <li class="breadcrumb-item text-dark">Edit</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="btn btn-sm btn-primary text-decoration-none fw-bold float-end" href="view-experiences">Experiences</a>
                </div>
                <div class="card-body">
                    <?php
                    $exp_id = $_GET['id'];
                    $edit_query = mysqli_query($conn, "SELECT * FROM experiences WHERE id='$exp_id' LIMIT 1");

                    if (mysqli_num_rows($edit_query) > 0) {
                        $exp_data = mysqli_fetch_array($edit_query);

                    ?>
                        <form action="controllers/experiencecode" method="POST">
                            <input type="hidden" name="exp_id" value="<?= $exp_id ?>">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Designation</label>
                                    <input class="form-control" type="text" name="designation" value="<?= $exp_data['designation'] ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Company Name</label>
                                    <input class="form-control" type="text" name="cmp_name" value="<?= $exp_data['company_name'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Start Year</label>
                                    <input class="form-control" type="date" name="start_date" value="<?= $exp_data['start_date'] ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Completion Year</label>
                                    <input class="form-control" type="date" name="end_date" value="<?= $exp_data['end_date'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control" id="summernote" name="designation_desc"><?= htmlentities($exp_data['description']) ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" <?= $exp_data['status'] == '1' ? 'checked' : '' ?>>
                                </div>
                            </div>
                            <hr class="pt-1 bg-secondary">
                            <button class="btn btn-sm btn-primary float-end" type="submit" name="update_experience_btn">Update</button>
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