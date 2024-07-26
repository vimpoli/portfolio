<?php
$title = 'Dashboard - Add Skill';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Skills</li>
                <li class="breadcrumb-item text-dark">Add</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="btn btn-sm btn-secondary text-decoration-none fw-bold" href="./">Back</a>
                    <a class="btn btn-sm btn-primary text-decoration-none fw-bold float-end" href="view-skills">Skills</a>
                </div>
                <div class="card-body">
                    <form action="controllers/skillcode" method="POST">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'] ?>">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label>Skill</label>
                                <input class="form-control" type="text" name="skill" placeholder="e.g web development" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" name="status">
                            </div>
                        </div>
                        <hr class="pt-1 bg-secondary">
                        <button class="btn btn-sm btn-primary float-end" type="submit" name="add_skill_btn">Save</button>
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