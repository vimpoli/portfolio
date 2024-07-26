<?php
$title = 'Dashboard - View Categories';

include('includes/header.php');
if ($_SESSION['auth_role'] == '1') :
?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item text-dark">Categories</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a href="./" class="btn btn-secondary btn-sm">Back</a>
                        <a href="add-category" class="btn btn-primary btn-sm float-end mx-1">Add Category</a>
                        <a href="view-trashes" class="btn btn-danger btn-sm float-end mx-1">Trashes</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myDataTable" class="table table-border border-light pt-3">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Category</th>
                                        <th>Navbar Status</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM categories WHERE status != '2'");
                                    $count = '1';
                                    if (mysqli_num_rows($query) > 0) {
                                        foreach ($query as $category) {
                                    ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $category['category'] ?></td>
                                                <td>
                                                    <form action="controllers/categorycode?id=<?= $category['id'] ?>" method="POST">
                                                        <button class="btn badge btn-<?= $category['navbar_status'] == '1' ? 'success' : 'secondary' ?> py-2 disabled"><?= $category['navbar_status'] == '1' ? 'Visible' : 'Hidden' ?></button>
                                                        <button type="submit" name="catgNavbarStatusBtn" value="<?= $category['navbar_status'] ?>" class="btn badge btn-<?= $category['navbar_status'] == '1' ? 'danger' : 'success' ?> btn-sm py-2"><?= $category['navbar_status'] == '1' ? 'Hide' : 'Show' ?></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="controllers/categorycode?id=<?= $category['id'] ?>" method="POST">
                                                        <button class="btn badge btn-<?= $category['status'] == '1' ? 'success' : 'secondary' ?> py-2 disabled"><?= $category['status'] == '1' ? 'Visible' : 'Hidden' ?></button>
                                                        <button type="submit" name="catgStatusBtn" value="<?= $category['status'] ?>" class="btn badge btn-<?= $category['status'] == '1' ? 'danger' : 'success' ?> btn-sm py-2"><?= $category['status'] == '1' ? 'Hide' : 'Show' ?></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="controllers/categorycode" method="POST">
                                                        <a class="btn btn-sm btn-primary" href="edit-category?id=<?= $category['id'] ?>"><i class="far fa-edit"></i> Edit</a>
                                                        <button type="submit" name="move_trash_btn" value="<?= $category['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
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