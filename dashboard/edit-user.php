<?php
$title = 'Dashboard - Edit User';

include('includes/header.php');

$user_active_id = $_SESSION['auth_user']['user_id'];
$user_active_role = $_SESSION['auth_role'];
$user_id = mysqli_real_escape_string($conn, $_GET['id']);

if ($user_active_id === $user_id || $user_active_role == '1') :
?>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item active">Users</li>
                    <li class="breadcrumb-item text-dark">Edit</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a class="text-decoration-none fw-bold btn btn-sm btn-secondary" href="./">Back</a>
                        <a class="text-decoration-none fw-bold float-end btn btn-sm btn-primary" href="view-users">Users</a>
                    </div>
                    <div class="card-body">
                        <?php
                        $user_id = $_GET['id'];
                        $edit_query = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");

                        if (mysqli_num_rows($edit_query) > 0) {
                            $data = mysqli_fetch_array($edit_query);
                        ?>
                            <form action="controllers/usercode" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?= $user_id ?>">

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label>Name</label>
                                        <input class="form-control" type="text" value="<?= $data['name'] ?>" name="name">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label>DOB</label>
                                        <input class="form-control" type="date" name="dob" value="<?= $data['dob'] ?>">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Edit Bio</label>
                                        <textarea class="form-control" id="summernote" type="text" name="bio"><?= $data['bio']?></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" name="phone" value="<?= $data['phone'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label>Address</label>
                                        <input class="form-control" type="text" name="address" value="<?= $data['address'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label>Upload Profile</label><span class="text-muted small"> &#8633; File format: .jpg .png &mid; Size: Less than 500KB</span>
                                        <input type="hidden" name="old_profile" value="<?= $data['profile'] ?>">
                                        <input class="form-control" type="file" name="profile">
                                        <small class="text-primary"><?= $data['profile'] ?></small>
                                        <?php if ($data['profile'] != NULL) : ?>
                                            <img class="mt-1 rounded" src="../uploads/profiles/<?= $data['profile'] ?>" alt="Profile" style="width:fit-content;height:400px;">
                                        <?php else :
                                        ?>
                                            <img class="mt-1 rounded" src="assets/images/avatar-dummy-img.jpg" alt="Profile" style="width:fit-content;height:400px;">
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label>Upload Resume</label><span class="text-muted small"> &#8633; File format: .pdf &mid; Size: Less than 500KB</span>
                                        <input type="hidden" name="old_resume" value="<?= $data['resume'] ?>">
                                        <input class="form-control" type="file" name="resume" accept=".pdf">
                                        <small class="text-primary"><?= $data['resume'] ?></small>
                                        <object class="mt-1" data="../uploads/cvs/<?= $data['resume'] ?>" width="475" height="400"></object>
                                    </div>
                                    <?php if ($_SESSION['auth_role'] == '1') : ?>
                                        <div class="form-group col-md-6 mb-3">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" value="<?= $data['email'] ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group col-md-6 mb-3">
                                        <label>New Password</label>
                                        <input type="hidden" name="old_password" value="<?= $data['password'] ?>">
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                    <?php if ($_SESSION['auth_role'] == '1') : ?>
                                        <div class="form-group col-md-6 mb-3">
                                            <label>Role</label>
                                            <select name="role_as" class="form-control" required>
                                                <option value="Select">---Select Role---</option>
                                                <option value="0" <?= $data['role_as'] == '0' ? 'selected' : '' ?>>User</option>
                                                <option value="1" <?= $data['role_as'] == '1' ? 'selected' : '' ?>>Admin</option>
                                                <option value="2" <?= $data['role_as'] == '2' ? 'selected' : '' ?>>Editor</option>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <hr class="pt-1 bg-secondary">
                                <button class="btn btn-sm btn-primary float-end" type="submit" name="update_user_btn">Update</button>
                            </form>
                        <?php
                        } else {
                        ?>
                            <h6 class="text-center">No Record Found</h6>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
endif;
include('includes/footer.php');
include('includes/scripts.php');
?>