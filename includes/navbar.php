<div class="<?= $page == 'login.php' || $page == 'register.php' || $page == 'profile.php' || $page == 'forgot-password.php'  || $page == 'reset-pass.php' ? 'd-none' : '' ?>">
    <div class="container navbar-bg mt-4">
        <div class="text-white d-flex">
            <div class="me-auto">
                <span class="small" id="contacts"></span>
            </div>
            <div class="ms-auto">
                <span class="small" id="timeAndDate"></span>
            </div>
        </div>
    </div>
</div>
<div class="container my-2">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-3">
            <a href="<?= base_url('') ?>"><img src="<?= base_url('assets/images/logo.png') ?>" alt="Auguste Blanqui" class="img-fluid w-100 w-sm-75"></a>
        </div>
        <div class="col-md-9">
            <div class="row justify-content-end">
                <?php
                $query =  mysqli_query($conn, "SELECT url,ads FROM ads WHERE ads_type='1' AND status='1'");
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $nav_ads) {
                        if ($nav_ads['ads'] != NULL && file_exists('uploads/ads/' . $nav_ads['ads'])) :
                ?>
                            <div class="col-md-11">
                                <div id="bannerAd1" class="shadow-sm bg-white rounded">
                                    <a href="<?= $nav_ads['url'] ?>" target="<?= $nav_ads['url'] != Null ? '_blank' : '' ?>">
                                        <img class="img-fluid w-100 w-sm-75 rounded" src="<?= base_url('uploads/ads/' . $nav_ads['ads']) ?>" alt="<?= $nav_ads['ads'] ?>">
                                    </a>
                                </div>
                            </div>
                <?php
                        endif;
                    }
                } else {
                    echo '';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
    <nav class="navbar navbar-expand-lg navbar-bg shadow navbar-dark sticky-top container <?= $page == 'login.php' || $page == 'register.php' || $page == 'profile.php' || $page == 'forgot-password.php'  || $page == 'reset-pass.php' ? 'rounded-top' : 'rounded-0' ?>">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-sm-success"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item fw-bold">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('') ?>"><i class="fas fa-home"></i></a>
                </li>
                <li class="nav-item fw-bold">
                    <a class="nav-link" href="<?= base_url('note') ?>">Notes</a>
                </li>
                <?php
                $query = mysqli_query($conn, "SELECT category,slug FROM categories WHERE status='1' AND navbar_status='1'");
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $category) {
                ?>
                        <li class="nav-item fw-bold">
                            <a class="nav-link" href="<?= base_url('category/' . $category['slug']) ?>"><?= $category['category'] ?></a>
                        </li>
                    <?php
                    }
                }
                if (isset($_SESSION['auth_user'])) :
                    ?>
                    <li class="nav-item fw-bold dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['auth_user']['user_name']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('dashboard') ?>">Dashboard</a>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <form action="<?= base_url('controllers/logoutcode') ?>" method="POST">
                                    <button type="submit" name="logout_btn" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>

                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item fw-bold">
                        <a href="<?= base_url('login') ?>" class="nav-link">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>