<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="py-5">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="card card-body text-center bg-light">
                            <h2><i class="fa-solid text-danger fa-exclamation"></i></h2>
                            <h4>Page Not Found</h4>
                            <a href="<?= base_url('') ?>"><button class="btn btn-sm btn-rounded">Go Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include('includes/footer.php');
    include('includes/scripts.php');
    ?>