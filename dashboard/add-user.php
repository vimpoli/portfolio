<?php
$title = 'Dashboard - Add User';

include('includes/header.php');
if ($_SESSION['auth_role'] == '1') :
?>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item active">Users</li>
                    <li class="breadcrumb-item text-dark">Add</li>
                </ol>
                <?php
                include('../msg.php');
                ?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a class="text-decoration-none fw-bold float-end btn btn-sm btn-primary" href="view-users">Users</a>
                    </div>
                    <div class="card-body">
                        <form action="controllers/usercode" method="POST">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="fname" class="form-control" id="firstName" placeholder="First Name">
                                        <label for="firstName">First Name</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="lname" class="form-control" id="lastName" placeholder="Last Name">
                                        <label for="lastName">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                                        <label for="phone">Phone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="newPassword" placeholder="New password">
                                        <label for="newPassword">New password</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" name="cconfirm_password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                                        <label for="confirmPassword">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="form-group col-md-6">
                                    <select name="role" id="roleAs" class="form-control">
                                        <option for="roleAs" value="">--Select Role--</option>
                                        <option for="roleAs" value="0">User</option>
                                        <option for="roleAs" value="1">Admin</option>
                                        <option for="roleAs" value="2">Editor</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="pt-1 bg-secondary">
                            <button class="btn btn-sm btn-primary float-end" type="submit" name="add_user_btn">Save</button>
                        </form>

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
                    <h4>You are not authorized</h4>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
include('includes/footer.php');
include('includes/scripts.php');
?>