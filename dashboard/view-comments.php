<?php
$title = 'Dashboard - View Comments';

include('includes/header.php');
if ($_SESSION['auth_role'] == '1') :
?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item text-dark">Comments</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a href="./" class="btn btn-sm btn-secondary text-decoration-none fw-bold">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myDataTable" class="table table-hover pt-3">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Post ID</th>
                                        <th>Name</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM comments");
                                    $count = '1';
                                    if (mysqli_num_rows($query) > 0) {
                                        foreach ($query as $comment) {
                                    ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $comment['post_id'] ?></td>
                                                <td><?= $comment['name'] ?></td>
                                                <td><?= $comment['comment'] ?></td>
                                                <td>
                                                    <form action="controllers/commentcode?id=<?= $comment['id'] ?>" method="POST">
                                                        <button type="submit" name="statusCmntBtn" value="<?= $comment['status'] ?>" class="btn btn-primary badge <?= $comment['status'] == '1' ? 'bg-success' : 'bg-danger' ?> py-2">
                                                        <i class="<?= $comment['status'] == '1' ? 'fas fa-globe-asia' : 'fas fa-lock' ?>"></i> <?= $comment['status'] == '1' ? 'Public' : 'Hidden' ?>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="controllers/commentcode" method="POST">
                                                        <button type="submit" name="del_comment_btn" value="<?= $comment['id'] ?>" class="btn btn-sm btn-danger" href=""><i class="fas fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No Records Found</td>
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
else :
?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-body text-center fw-bold">
                    <h4><a class="text-decoration-none" href="./">You are not authorized</a></h4>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
include('includes/footer.php');
include('includes/scripts.php');
?>