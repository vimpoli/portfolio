<nav class="sb-topnav navbar navbar-expand topbar-bg shadow">
    <a class="navbar-brand ps-3" href="./">Dashboard</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-success" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['auth_user']['user_name'] ?> &nbsp; <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li class="dropdown-item"><a class="text-dark" href="../">Go Back</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="../controllers/logoutcode" method="POST">
                        <button name="logout_btn" type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>