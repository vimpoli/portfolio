<?php
$title = 'Dashboard - View Trashes';
include('includes/header.php');
if ($_SESSION['auth_role'] == '1') :
?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item text-dark">Trashes</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a href="view-categories" class="btn btn-sm btn-primary float-end">Categories</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myDataTable" class="table table-hover pt-3">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM categories WHERE status = '2'");
                                    $count = '1';
                                    if (mysqli_num_rows($query) > 0) {
                                        foreach ($query as $category) {
                                    ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $category['category'] ?></td>
                                                <td>
                                                    <form action="controllers/categorycode" method="POST">
                                                        <button type="submit" name="del_category_btn" value="<?= $category['id'] ?>" class="btn btn-sm btn-danger mb-1" href=""><i class="fas fa-trash"></i> Delete Permanently</button>
                                                        <button type="submit" name="restore_category_btn" value="<?= $category['id'] ?>" class="btn btn-sm btn-success mb-1" href=""><i class="fas fa-trash-restore"></i> Restore</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No Records Found</td>
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
                    <h4><a class="text-decoration-none" href="">You are not authorized</a></h4>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
include('includes/footer.php');
include('includes/scripts.php');
?>