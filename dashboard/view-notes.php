<?php
$title = 'Dashboard - View Notes';

include('includes/header.php');
if ($_SESSION['auth_role'] == '1' || $_SESSION['auth_role'] == '2') :
?>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item text-dark">Notes</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a class="btn btn-sm btn-secondary text-decoration-none fw-bold" href="./">Back</a>
                        <a class="btn btn-sm btn-primary text-decoration-none fw-bold float-end" href="add-note">Add Note</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover pt-3" id="myDataTable">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Author</th>
                                        <th>Notes</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $view_query = mysqli_query($conn, "SELECT * FROM notes");

                                    if (mysqli_num_rows($view_query) > 0) {
                                        foreach ($view_query as $note) {
                                    ?>
                                            <tr>
                                                <td><?= $note['id'] ?></td>
                                                <td><?= $note['author'] ?></td>
                                                <td>
                                                    <a href="../uploads/notes/<?= $note['note'] ?>"><?= $note['title'] ?></a>
                                                </td>
                                                <td>
                                                    <form action="controllers/notecode?id=<?= $note['id'] ?>" method="POST">
                                                        <button type="submit" class="btn btn-sm btn-<?= $note['status'] == '1' ? 'success' : 'secondary' ?>" name="note_visibility_btn" value="<?= $note['status'] ?>">
                                                            <?= $note['status'] == '1' ? 'Visible' : 'Hidden' ?>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="controllers/notecode" method="POST">
                                                        <a class="btn btn-sm btn-primary mb-1" href="edit-note?id=<?= $note['id'] ?>"><i class="far fa-edit"></i> Edit</a>
                                                        <?php
                                                        if ($_SESSION['auth_role'] == '1') {
                                                        ?>
                                                            <button class="btn btn-sm btn-danger mb-1" name="del_note_btn" value="<?= $note['id'] ?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                                        <?php
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
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