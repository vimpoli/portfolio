<?php
$title = 'Dashboard - Add Education';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item text-dark active">Qualifications</li>
                <li class="breadcrumb-item text-dark">Add</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="text-decoration-none fw-bold float-end btn btn-sm btn-primary" href="view-educations">Qualifications</a>
                    <a class="text-decoration-none fw-bold btn btn-sm btn-secondary" href="./">Back</a>
                </div>
                <div class="card-body">
                    <form action="controllers/educationcode" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label>Board Or University</label>
                                <select name="board_or_university" class="form-control" aria-describedby="inputGroup-sizing-sm" required>
                                    <option value="">--Select--</option>
                                    <option value="1">Government of Nepal</option>
                                    <option value="2">HSEB &mid; NEB</option>
                                    <option value="3">Tribhuwan University</option>
                                    <option value="4">Pokhara Univerity</option>
                                    <option value="5">Purbanchal University</option>
                                    <option value="6">Mid-Western University</option>
                                    <option value="7">Kathmandu University</option>
                                    <option value="8">Sanskrit University</option>
                                    <option value="9">Far Western University</option>
                                    <option value="10">CTEVT</option>
                                    <option value="11">Agriculture and Forestry University</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Level</label>
                                <select name="level" class="form-control" aria-describedby="inputGroup-sizing-sm" required>
                                    <option value="">--Select--</option>
                                    <option value="1">SLC &mid; SEE</option>
                                    <option value="2">+2 &mid; PCL</option>
                                    <option value="3">Bachelors</option>
                                    <option value="4">Masters</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="summernote" placeholder="Description about degree"></textarea>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>School Or College</label>
                                <input class="form-control" type="text" name="college_name" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Completion Year</label>
                                <input class="form-control" type="number" name="completion_year">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Percentage Or CGPA</label>
                                <input class="form-control" type="text" name="percent_or_gpa" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="mb-3">
                                <div class="pt-1 bg-success mb-3"></div>
                                <button class="btn btn-sm btn-primary float-end" type="submit" name="add_education_btn">Save</button>
                            </div>
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