<?php
$title = 'Dashboard - View Posts';

include('includes/header.php');
if ($_SESSION['auth_role'] == '1' || $_SESSION['auth_role'] == '2') :
?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item text-dark">Posts</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a href="./" class="btn btn-sm btn-secondary">Back</a>
                        <a href="add-post" class="btn btn-sm btn-primary float-end">Add Post</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myDataTable" class="table table-hover pt-3">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Category</th>
                                        <th>Post Title</th>
                                        <th>Feature Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT p.*, c.category AS category FROM posts p,categories c WHERE p.category_id = c.id");
                                    $count = '1';
                                    if (mysqli_num_rows($query) > 0) {
                                        foreach ($query as $post) {
                                    ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $post['category'] ?></td>
                                                <td><?= $post['title'] ?></td>
                                                <td>
                                                    <img class="rounded" src="../uploads/posts/<?= $post['feature_img'] ?>" style="width:250px;height:300px" alt="Feature Image">
                                                </td>
                                                <td>
                                                    <form action="controllers/postcode?id=<?= $post['id'] ?>" method="POST">
                                                        <button class="btn btn-<?= $post['status'] == '1' ? 'success' : 'secondary' ?> btn-sm disabled m-0 mb-1"><?= $post['status'] == '1' ? 'Visible' : 'Hidden' ?></button>
                                                        <button class="btn btn-<?= $post['status'] == '1' ? 'danger' : 'success' ?> btn-sm m-0 mb-1" type="submit" name="postStatusBtn" value="<?= $post['status'] ?>"><?= $post['status'] == '1' ? 'Hide' : 'Show' ?></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="controllers/postcode" method="post">
                                                        <a class="btn btn-sm btn-primary mb-1" href="edit-post?id=<?= $post['id'] ?>"><i class="fas fa-edit"></i> Edit</a>
                                                        <button class="btn btn-sm btn-danger mb-1" type="submit" name="del_post_btn" value="<?= $post['id'] ?>" href=""><i class="fas fa-trash-alt"></i> Delete</button>
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