<?php
$title = 'Dashboard - Edit Skill';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Skills</li>
                <li class="breadcrumb-item text-dark">Edit</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="btn btn-sm btn-primary text-decoration-none fw-bold float-end" href="view-skills">Skills</a>
                </div>
                <div class="card-body">
                    <?php
                    $skill_id = $_GET['id'];
                    // $edit_query = mysqli_query($conn, "SELECT * FROM skill_tbl WHERE id='$skill_id' LIMIT 1");
                    $edit_query = mysqli_query($conn, "SELECT * FROM skills WHERE id='$skill_id' LIMIT 1");

                    if (mysqli_num_rows($edit_query) > 0) {
                        $skill_data = mysqli_fetch_array($edit_query);
                    ?>
                        <form action="controllers/skillcode" method="POST">
                            <input type="hidden" name="skill_id" value="<?= $skill_id ?>">
                            <div class="row my-3">
                                <div class="form-group col-md-6 mb-2">
                                    <label>Skill</label>
                                    <input class="form-control" type="text" name="skill" value="<?= $skill_data['skill'] ?>">
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label>Excellence</label>
                                    <input class="form-control" type="number" name="skill_excellence" value="<?= $skill_data['skill_excellence'] ?>">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="form-group col-md-6 mb-2">
                                    <Select class="form-control" name="skill_color">
                                        <option value="primary">Primary</option>
                                        <option value="secondary">Secondary</option>
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="light">Light</option>
                                        <option value="dark">Dark</option>
                                        <option value="info">Info</option>
                                    </Select>
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" <?= $skill_data['status'] == '1' ? 'checked' : '' ?>>
                                </div>
                            </div>
                            <hr class="pt-1 bg-secondary">
                            <button class="btn btn-sm btn-primary float-end" type="submit" name="update_skill_btn">Update</button>
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