<?php
$title = 'Dashboard';

include('includes/header.php');
?>

<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <?php if ($_SESSION['auth_role'] == '1') : ?>
                <h4>Core</h4>
                <div class="pt-1 bg-primary mb-3 rounded"></div>
                <div class="row mb-5">
                    <div class="col-md-4 mb-3">
                        <div class="card shadow border-0 mb-4 ">
                            <div class="card-body">Users
                                <?php
                                $user_query_run = mysqli_query($conn, "SELECT * FROM users");

                                if ($total_users = mysqli_num_rows($user_query_run)) {
                                    echo '<h6 class="mb-0">' . $total_users . '</h6>';
                                } else {
                                    echo '<h6 class="mb-0">No Data</h6>';
                                }
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small stretched-link" href="view-users">View Details</a>
                                <div class="small "><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card shadow border-0  mb-4">
                            <div class="card-body">Messages
                                <?php
                                $msg_query_run = mysqli_query($conn, "SELECT * FROM messages");

                                if ($num_of_msg = mysqli_num_rows($msg_query_run)) {
                                    echo '<h6 class="mb-0">' . $num_of_msg . '</h6>';
                                } else {
                                    echo '<h6 class="mb-0">No Data</h6>';
                                }
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small  stretched-link" href="view-messages">View Details</a>
                                <div class="small "><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow border-0  mb-4">
                            <div class="card-body">Comments
                                <?php
                                $comment_query = mysqli_query($conn, "SELECT * FROM comments");

                                if ($comments = mysqli_num_rows($comment_query)) {
                                    echo '<h6 class="mb-0">' . $comments . '</h6>';
                                } else {
                                    echo '<h6 class="mb-0">No Data</h6>';
                                }
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small  stretched-link" href="view-comments">View Details</a>
                                <div class="small "><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endif; ?>
            <h4>Portfolio</h4>
            <div class="pt-1 bg-primary mb-3 rounded"></div>
            <div class="row mb-5">

                <div class="col-xl-3 col-md-4 mb-3">
                    <div class="card shadow border-0  mb-4">
                        <div class="card-body">Skills
                            <?php
                            $skill_query = mysqli_query($conn, "SELECT * FROM skills");

                            if ($num_of_skill = mysqli_num_rows($skill_query)) {
                                echo '<h6 class="mb-0">' . $num_of_skill . '</h6>';
                            } else {
                                echo '<h6 class="mb-0">No Data</h6>';
                            }
                            ?>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small  stretched-link" href="view-skills">View Details</a>
                            <div class="small "><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 mb-3">
                    <div class="card shadow border-0  mb-4">
                        <div class="card-body">Qualifications
                            <?php
                            $edu_query_run = mysqli_query($conn, "SELECT * FROM qualifications");

                            if ($total_edus = mysqli_num_rows($edu_query_run)) {
                                echo '<h6 class="mb-0">' . $total_edus . '</h6>';
                            } else {
                                echo '<h6 class="mb-0">No Data</h6>';
                            }
                            ?>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small  stretched-link" href="view-educations">View Details</a>
                            <div class="small "><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 mb-3">
                    <div class="card shadow border-0  mb-4">
                        <div class="card-body">Experiences
                            <?php
                            $experience_query = mysqli_query($conn, "SELECT * FROM experiences");

                            if ($num_of_experience = mysqli_num_rows($experience_query)) {
                                echo '<h6 class="mb-0">' . $num_of_experience . '</h6>';
                            } else {
                                echo '<h6 class="mb-0">No Data</h6>';
                            }
                            ?>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small  stretched-link" href="view-experiences">View Details</a>
                            <div class="small "><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 mb-3">
                    <div class="card shadow border-0  mb-4">
                        <div class="card-body">Trainings
                            <?php
                            $training_query = mysqli_query($conn, "SELECT * FROM trainings");

                            if ($num_of_training = mysqli_num_rows($training_query)) {
                                echo '<h6 class="mb-0">' . $num_of_training . '</h6>';
                            } else {
                                echo '<h6 class="mb-0">No Data</h6>';
                            }
                            ?>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small  stretched-link" href="view-trainings">View Details</a>
                            <div class="small "><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            </div>
            <?php if ($_SESSION['auth_role'] == '1' || $_SESSION['auth_role'] == '2') : ?>
                <h4>Blog</h4>
                <div class="pt-1 bg-primary mb-3 rounded"></div>
                <div class="row mb-5">
                    <div class="col-xl-3 col-md-4 mb-3">
                        <div class="card shadow border-0  mb-4">
                            <div class="card-body">Notes
                                <?php
                                $edu_query_run = mysqli_query($conn, "SELECT * FROM notes");

                                if ($total_edus = mysqli_num_rows($edu_query_run)) {
                                    echo '<h6 class="mb-0">' . $total_edus . '</h6>';
                                } else {
                                    echo '<h6 class="mb-0">No Data</h6>';
                                }
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small  stretched-link" href="view-notes">View Details</a>
                                <div class="small "><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <?php if ($_SESSION['auth_role'] == '1') : ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card shadow border-0  mb-4">
                                <div class="card-body">Categories
                                    <?php
                                    $edu_query_run = mysqli_query($conn, "SELECT * FROM categories");

                                    if ($total_edus = mysqli_num_rows($edu_query_run)) {
                                        echo '<h6 class="mb-0">' . $total_edus . '</h6>';
                                    } else {
                                        echo '<h6 class="mb-0">No Data</h6>';
                                    }
                                    ?>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small  stretched-link" href="view-categories">View Details</a>
                                    <div class="small "><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card shadow border-0  mb-4">
                            <div class="card-body">Posts
                                <?php
                                $trn_query_run = mysqli_query($conn, "SELECT * FROM posts");

                                if ($total_trns = mysqli_num_rows($trn_query_run)) {
                                    echo '<h6 class="mb-0">' . $total_trns . '</h6>';
                                } else {
                                    echo '<h6 class="mb-0">No Data</h6>';
                                }
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small  stretched-link" href="view-posts">View Details</a>
                                <div class="small "><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>


</div>
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>