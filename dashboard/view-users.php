<?php
$title = 'Dashboard - View Users';

include('includes/header.php');
?>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item text-dark">Users</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="text-decoration-none btn btn-sm btn-secondary fw-bold" href="./">Back</a>
                    <?php if ($_SESSION['auth_role'] == '1') : ?><a class="float-end text-decoration-none btn btn-sm btn-primary fw-bold" href="add-user">Add User</a><?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover pt-3" id="myDataTable">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <?php if ($_SESSION['auth_role'] == '1') : ?>
                                        <th>Role</th>
                                        <th>Status</th>
                                    <?php endif; ?>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user_query_run = mysqli_query($conn, "SELECT * FROM users");
                                $user_active_id = $_SESSION['auth_user']['user_id'];
                                $user_active_role = $_SESSION['auth_role'];
                                $count = '1';
                                if (mysqli_num_rows($user_query_run) > 0) {
                                    foreach ($user_query_run as $user) {
                                        if (($user_active_role == '1') || ($user['id'] == $user_active_id)) :
                                ?>
                                            <tr>

                                                <td><?= $count++ ?> </td>
                                                <td><?= $user['name'] ?></td>
                                                <td><?= $user['email'] ?></td>
                                                <?php if ($user_active_role == '1') : ?>
                                                    <td>
                                                        <?php
                                                        $role = $user['role_as'];
                                                        switch ($role) {
                                                            case 0:
                                                                echo 'User';
                                                                break;
                                                            case 1:
                                                                echo 'Admin';
                                                                break;
                                                            case 2:
                                                                echo 'Editor';
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <form action="controllers/usercode?id=<?= $user['id'] ?>" method="POST">
                                                            <button type="submit" class="btn btn-sm btn-<?= $user['status'] == '1' ? 'success' : 'danger' ?>" name="user_status_btn" value="<?= $user['status'] ?>">
                                                                <?= $user['status'] == '1' ? 'Active' : 'Blocked' ?>
                                                            </button>
                                                    </td>
                                                <?php endif; ?>
                                                <td>
                                                    <form action="controllers/usercode" method="POST">
                                                        <a class="btn btn-sm btn-primary mb-1" href="edit-user?id=<?= $user['id'] ?>"><i class="far fa-edit"></i> Edit</a>
                                                        <?php if ($_SESSION['auth_role'] == '1') : ?>
                                                            <button class="btn btn-sm btn-danger mb-1" type="submit" name="del_user_btn" value="<?= $user['id'] ?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                                        <?php endif; ?>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        endif;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td class="text-center" colspan="6">No Records Found</td>
                                    </tr>
                                <?php } ?>
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