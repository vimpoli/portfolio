<?php
$page_title = 'Login';

include('includes/header.php');
include('includes/navbar.php');
include('auth.php');
?>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <?php
            include('msg.php');
            ?>
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-2">Login</h3>
                </div>
                <div class="card-body">
                    <form action="controllers/logincode" method="POST">
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <label class="fs-6 fw-bold">Email</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                            <div class="form-group col-md-12 mt-2 mb-3">
                                <label class="fs-6 fw-bold">Password</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="d-grid my-3">
                            <button type="submit" name="login_btn" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="medium">Don't have an account? <a class="text-decoration-none" href="<?= base_url('register') ?>"> Sign up</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>