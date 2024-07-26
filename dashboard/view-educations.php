<?php
$title = 'Dashboard - View Educations';
include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item text-dark">Qualifications</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="text-decoration-none btn btn-sm btn-secondary fw-bold" href="add-education">Back</a>
                    <a class="float-end text-decoration-none btn btn-sm btn-primary fw-bold" href="add-education">Add Education</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover pt-3" id="myDataTable">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Board Or University</th>
                                    <th>School Or College</th>
                                    <th>Level</th>
                                    <th>Completion Year</th>
                                    <th>Percentage or CGPA</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM qualifications");
                                $user_active_id = $_SESSION['auth_user']['user_id'];
                                $user_active_role = $_SESSION['auth_role'];
                                $count = '1';
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $education) {
                                        if (($user_active_role == '1') || ($education['user_id'] == $user_active_id)) :
                                ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td>
                                                    <?php
                                                    $board_or_university = $education['board_or_university'];
                                                    switch ($board_or_university) {
                                                        case 1:
                                                            echo 'Government of Nepal';
                                                            break;
                                                        case 2:
                                                            echo 'HSEB &mid; NEB';
                                                            break;
                                                        case 3:
                                                            echo 'Tribhuwan University';
                                                            break;
                                                        case 4:
                                                            echo 'Pokhara University';
                                                            break;
                                                        case 5:
                                                            echo 'Purbanchal University';
                                                            break;
                                                        case 6:
                                                            echo 'Mid-Western University';
                                                            break;
                                                        case 7:
                                                            echo 'Kathmandu University';
                                                            break;
                                                        case 8:
                                                            echo 'Sanskrit University';
                                                            break;
                                                        case 9:
                                                            echo 'Far-Western University';
                                                            break;
                                                        case 10:
                                                            echo 'CTEVT';
                                                            break;
                                                        case 11:
                                                            echo 'Agriculture and Forestry University';
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $education['college_name'] ?></td>
                                                <td><?php
                                                    $level = $education['level'];

                                                    switch ($level) {
                                                        case 1:
                                                            echo 'SLC &mid; SEE';
                                                            break;
                                                        case 2:
                                                            echo '+2 &mid; PCL';
                                                            break;
                                                        case 3:
                                                            echo 'Bachelors';
                                                            break;
                                                        case 4:
                                                            echo 'Masters';
                                                            break;
                                                    }
                                                    ?></td>
                                                <td><?= $education['completion_year'] ?></td>
                                                <td><?= $education['percentage_or_cgpa'] ?></td>
                                                <td>
                                                    <form action="controllers/educationcode?id=<?= $education['id'] ?>" method="POST">
                                                        <button type="submit" class="btn btn-sm btn-<?= $education['status'] == '1' ? 'success' : 'secondary' ?>" name="education_visibility_btn" value="<?= $education['status'] ?>">
                                                            <?= $education['status'] == '1' ? 'Visible' : 'Hidden' ?>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="controllers/educationcode" method="POST">
                                                        <a class="btn btn-sm btn-primary mb-1" href="edit-education?id=<?= $education['id'] ?>"><i class="far fa-edit"></i> Edit</a>
                                                        <?php
                                                        if ($_SESSION['auth_role'] == '1') {
                                                        ?>
                                                            <button class="btn btn-sm btn-danger mb-1" name="del_education_btn" value="<?= $education['id'] ?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                                        <?php
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        endif;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td class="text-center" colspan="7">No Records Found</td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>