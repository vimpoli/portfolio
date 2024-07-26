<?php
$title = 'Dashboard - Edit Education';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item text-dark active">Qualifications</li>
                <li class="breadcrumb-item text-dark">Edit</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="text-decoration-none fw-bold float-end btn btn-sm btn-primary" href="view-educations">Qualifications</a>
                    <a class="text-decoration-none fw-bold float-start btn btn-sm btn-secondary" href="./">Back</a>
                </div>
                <div class="card-body">
                    <?php
                    $edu_id = $_GET['id'];
                    $query = mysqli_query($conn, "SELECT * FROM qualifications WHERE id='$edu_id' LIMIT 1");

                    if (mysqli_num_rows($query) > 0) {
                        $education = mysqli_fetch_array($query);

                    ?>
                        <form action="controllers/educationcode" method="POST">
                            <input type="hidden" name="edu_id" value="<?= $edu_id ?>">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Board Or University</label>
                                    <select name="board_or_university" class="form-control" aria-describedby="inputGroup-sizing-sm" required>
                                        <option value="">--Select--</option>
                                        <option value="1" <?= $education['board_or_university'] == '1' ? 'selected' : '' ?>>Government of Nepal</option>
                                        <option value="2" <?= $education['board_or_university'] == '2' ? 'selected' : '' ?>>HSEB &mid; NEB</option>
                                        <option value="3" <?= $education['board_or_university'] == '3' ? 'selected' : '' ?>>Tribhuwan University</option>
                                        <option value="4" <?= $education['board_or_university'] == '4' ? 'selected' : '' ?>>Pokhara Univerity</option>
                                        <option value="5" <?= $education['board_or_university'] == '5' ? 'selected' : '' ?>>Purbanchal University</option>
                                        <option value="6" <?= $education['board_or_university'] == '6' ? 'selected' : '' ?>>Mid-Western University</option>
                                        <option value="7" <?= $education['board_or_university'] == '7' ? 'selected' : '' ?>>Kathmandu University</option>
                                        <option value="8" <?= $education['board_or_university'] == '8' ? 'selected' : '' ?>>Sanskrit University</option>
                                        <option value="9" <?= $education['board_or_university'] == '9' ? 'selected' : '' ?>>Far Western University</option>
                                        <option value="10" <?= $education['board_or_university'] == '10' ? 'selected' : '' ?>>CTEVT</option>
                                        <option value="11" <?= $education['board_or_university'] == '11' ? 'selected' : '' ?>>Agriculture and Forestry University</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Level</label>
                                    <select name="level" class="form-control" aria-describedby="inputGroup-sizing-sm" required>
                                        <option value="">--Select--</option>
                                        <option value="1" <?= $education['level'] == '1' ? 'selected' : '' ?>>SLC &mid; SEE</option>
                                        <option value="2" <?= $education['level'] == '2' ? 'selected' : '' ?>>+2 &mid; PCL</option>
                                        <option value="3" <?= $education['level'] == '3' ? 'selected' : '' ?>>Bachelors</option>
                                        <option value="4" <?= $education['level'] == '4' ? 'selected' : '' ?>>Masters</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control" id="summernote" name="description"><?= $education['description'] ?></textarea>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>College Name</label>
                                    <input class="form-control" type="text" name="college_name" value="<?= $education['college_name'] ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Completion Year</label>
                                    <input class="form-control" type="number" name="completion_year" value="<?= $education['completion_year'] ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Percentage Or CGPA</label>
                                    <input class="form-control" type="text" name="percent_or_gpa" value="<?= $education['percentage_or_cgpa'] ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" <?= $education['status'] == '1' ? 'checked' : '' ?>>
                                </div>
                                <div class="mb-3">
                                    <div class="pt-1 bg-success mb-3"></div>
                                    <button class="btn btn-sm btn-primary float-end" type="submit" name="update_education_btn">Update</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    } else {
                    ?>
                        <h4 class="text-center">No Record Found</h4>
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