<?php
$title = 'Dashboard - View Experiences';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item text-dark">Experiences</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="btn btn-sm btn-secondary text-decoration-none fw-bold" href="./">Back</a>
                    <a class="btn btn-sm btn-primary text-decoration-none fw-bold float-end" href="add-experience">Add Experience</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover pt-3" id="myDataTable">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Company</th>
                                    <th>Designation</th>
                                    <th>Period (A.D.)</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM experiences");
                                $user_active_id = $_SESSION['auth_user']['user_id'];
                                $user_active_role = $_SESSION['auth_role'];
                                $count = '1';
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $experience) {
                                        if (($user_active_role == '1') || ($experience['user_id'] == $user_active_id)) :
                                ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $experience['company_name'] ?></td>
                                                <td><?= $experience['designation'] ?></td>
                                                <td><?= $experience['start_date'] . " to " . $experience['end_date'] ?></td>
                                                <td>
                                                    <form action="controllers/experiencecode?id=<?= $experience['id'] ?>" method="POST">
                                                        <button type="submit" class="btn btn-sm btn-<?= $experience['status'] == '1' ? 'success' : 'secondary' ?>" name="experience_visibility_btn" value="<?= $experience['status'] ?>"><?= $experience['status'] == '1' ? 'Visible' : 'Hidden' ?></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="controllers/experiencecode" method="POST">
                                                        <a class="btn btn-sm btn-primary mb-1" href="edit-experience?id=<?= $experience['id'] ?>"><i class="far fa-edit"></i> Edit</a>
                                                        <button class="btn btn-sm btn-danger mb-1" name="del_experience_btn" value="<?= $experience['id'] ?>"><i class="fas fa-trash-alt"></i> Delete</button>
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