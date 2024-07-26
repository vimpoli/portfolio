<?php
$title = 'Dashboard - View Messages';

include('includes/header.php');
if ($_SESSION['auth_role'] == '1') :
?>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item text-dark">Messages</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a class="btn btn-sm btn-secondary text-decoration-none fw-bold" href="./">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover pt-3" id="myDataTable">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Subscribe Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $msg_query = mysqli_query($conn, "SELECT * FROM messages");

                                    if (mysqli_num_rows($msg_query) > 0) {
                                        foreach ($msg_query as $msg) {
                                    ?>
                                            <tr>
                                                <td><?= $msg['id'] ?> </td>
                                                <td><?= $msg['name'] ?></td>
                                                <td><?= $msg['email'] ?></td>
                                                <td><?= '<strong>' . date('l, F d, Y', strtotime($msg['created_at'])) . '</strong> <br>' . $msg['message'] ?> </td>
                                                <td><?= $msg['subscription'] == '1' ? 'Subscribed' : 'None' ?></td>
                                                <td>
                                                    <form action="controllers/messagecode" method="POST">
                                                        <button class="btn btn-sm btn-danger" type="submit" name="del_message_btn" value="<?= $msg['id'] ?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
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