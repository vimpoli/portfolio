<?php
$page_title = 'Register';

include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <?php
            include('msg.php');
            ?>
            <div class="card border-0 rounded-0">
                <div class="card-header text-center">
                    <h3>Create Account</h3>
                </div>
                <div class="card-body">
                    <form action="controllers/registercode" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label class="fs-6 fw-bold">First Name</label>
                                <input class="form-control" type="text" name="fname" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label class="fs-6 fw-bold">Last Name</label>
                                <input class="form-control" type="text" name="lname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label class="fs-6 fw-bold">Phone</label>
                                <input class="form-control" type="text" name="phone">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label class="fs-6 fw-bold">Address</label>
                                <input class="form-control" type="text" name="address">
                            </div>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="fs-6 fw-bold">Email</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label class="fs-6 fw-bold">Password</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label class="fs-6 fw-bold">Confirm Password</label>
                                <input class="form-control" type="password" name="c_password" required>
                            </div>
                        </div>
                        <div class="d-grid my-3">
                            <button type="submit" name="register_btn" class="btn btn-primary btn-block">Create Account</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="medium">Already have an account? <a class="text-decoration-none" href="<?= base_url('login') ?>">Login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>