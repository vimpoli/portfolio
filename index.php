<?php
$page_title = 'Bhim Prakash Oli - Web Developer';
$meta_description = 'Bhim Prakash Oli - Web Developer';
$meta_keywords = 'blanqui nepal,vim prakash oli';

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-12 bg-white py-3">
            <?php
            $email = 'vimprakasholi@gmail.com';
            $user_query = mysqli_query($conn, "SELECT id,name,profile,bio,resume,dob,address,phone,email,role_as FROM users WHERE email='$email' AND status='1' LIMIT 1");
            if (mysqli_num_rows($user_query) > 0) {
                $user_data = mysqli_fetch_array($user_query);
                $user_id = $user_data['id'];
            ?>
                <div class="row my-4">
                    <div class="col-md-7 mb-4">
                        <?php include('msg.php'); ?>
                        <h3 class="fw-bold">About Me</h3>
                        <div class="pt-1 bg-success mb-3 rounded"></div>
                        <p class="text-decoration-none"><?= $user_data['bio'] ?></p>
                        <hr>
                        <a class="btn btn-sm btn-outline-primary fw-bold <?= $user_data['resume'] != NULL ? '' : 'disabled' ?>" href="<?= $user_data['resume'] != NULL && file_exists('uploads/cvs/' . $user_data['resume']) ? base_url('uploads/cvs/' . $user_data['resume']) : '' ?>" <?= $user_data['resume'] != NULL ? 'download' : '' ?>>
                            Download Resume
                        </a>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div id="image-container" class="image-container mt-5">
                                <img id="selected-image" src="<?= $user_data['profile'] != NULL && file_exists('uploads/profiles/' . $user_data['profile']) ? base_url('uploads/profiles/') . $user_data['profile'] : base_url('assets/images/avatar-dummy-img.jpg') ?>" alt="Profile Image" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <h6 class="fw-bold">Personal Info</h6>
                        <div class="pt-1 bg-success rounded mb-3"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        Name<input class="form-control fw-bold" type="text" value="<?= $user_data['name'] ?>" disabled readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        Address<input class="form-control" type="text" value="<?= $user_data['address'] ?>" disabled readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        Phone<input class="form-control" type="text" value="<?= $user_data['phone'] ?>" disabled readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        Email <input class="form-control" type="text" value="<?= $user_data['email'] ?>" disabled readonly>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <h6>No Profile exists</h6>
            <?php
            }
            ?>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h6 class="fw-bold">Skills</h6>
                    <div class="pt-1 bg-success rounded my-3"></div>
                </div>
            </div>
            <div class="row">
                <?php
                $query = mysqli_query($conn, "SELECT skill FROM skills WHERE user_id='$user_id' AND status='1'");
                $count = 1;
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $skill) {
                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-3">
                            <div class="card card-body bg-warning py-2 border-0 shadow">
                                <?= $skill['skill'] ?>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <p class="text-center">No Record Found</p>
                <?php
                }
                ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">
                    <h6 class="fw-bold">Work Experiences</h6>
                    <div class="pt-1 bg-success rounded my-3"></div>
                </div>
            </div>
            <div class="table-responsive-sm shadow">
                <table class="table table-hover">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>S.No.</th>
                            <th>Designation</th>
                            <th>Company</th>
                            <th>From</th>
                            <th>To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM experiences WHERE user_id ='$user_id' AND status='1'");
                        $count = 1;
                        if (mysqli_num_rows($query) > 0) {
                            foreach ($query as $experience) {
                        ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $experience['designation'] ?></td>
                                    <td><?= $experience['company_name'] ?></td>
                                    <td><?= $experience['start_date'] ?></td>
                                    <td><?= $experience['end_date'] ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <td class="text-center" colspan="6">No Record Found</td>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">
                    <h6 class="fw-bold">Academic Details</h6>
                    <div class="pt-1 bg-success rounded my-3"></div>
                </div>
            </div>
            <div class="table-responsive-sm shadow">
                <table class="table table-hover">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>S.No.</th>
                            <th>Board Or University</th>
                            <th>Level</th>
                            <th>School Or College</th>
                            <th>Percentage Or CGPA</th>
                            <th>Passed Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM qualifications WHERE user_id ='$user_id' AND status='1'");
                        $count = 1;
                        if (mysqli_num_rows($query) > 0) {
                            foreach ($query as $edu_data) {
                        ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?php
                                        $brd_or_uni = $edu_data['board_or_university'];

                                        switch ($brd_or_uni) {
                                            case 1:
                                                echo 'Government of Nepal';
                                                break;
                                            case 2:
                                                echo 'HSEB &mid; NEB';
                                                break;
                                            case 3:
                                                echo 'Tribhuwan University';
                                                break;
                                            case 4:
                                                echo 'Pokhara University';
                                                break;
                                            case 5:
                                                echo 'Purbanchal University';
                                                break;
                                            case 6:
                                                echo 'Mid-Western University';
                                                break;
                                            case 7:
                                                echo 'Kathmandu University';
                                                break;
                                            case 8:
                                                echo 'Sanskrit University';
                                                break;
                                            case 9:
                                                echo 'Far-Western University';
                                                break;
                                            case 10:
                                                echo 'CTEVT';
                                                break;
                                            case 11:
                                                echo 'Agriculture and Forestry University';
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><?php
                                        $level = $edu_data['level'];

                                        switch ($level) {
                                            case 1:
                                                echo 'SLC &mid; SEE';
                                                break;
                                            case 2:
                                                echo '+2 &mid; PCL';
                                                break;
                                            case 3:
                                                echo 'Bachelors';
                                                break;
                                            case 4:
                                                echo 'Masters';
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><?= $edu_data['college_name'] ?></td>
                                    <td><?= $edu_data['percentage_or_cgpa'] ?></td>
                                    <td><?= $edu_data['completion_year'] ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <td class="text-center" colspan="6">No Record Found</td>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">
                    <h6 class="fw-bold">Trainings</h6>
                    <div class="pt-1 bg-success rounded my-3"></div>
                </div>
            </div>
            <div class="table-responsive-sm shadow">
                <table class="table table-hover">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Institution</th>
                            <th>From</th>
                            <th>To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM trainings WHERE user_id ='$user_id' AND status='1'");
                        $count = 1;
                        if (mysqli_num_rows($query) > 0) {
                            foreach ($query as $training) {
                        ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $training['name'] ?></td>
                                    <td><?= $training['institution'] ?></td>
                                    <td><?= $training['start_date'] ?></td>
                                    <td><?= $training['end_date'] ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <td class="text-center" colspan="5">No Record Found</td>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row py-3 justify-content-around bg-white shadow">
        <h3 class="fw-bold">Contact Us</h3>
        <div class="col-md-6 mb-3">
            <div class="pt-1 bg-success rounded my-0 mb-4"></div>
            <form action="<?= base_url('controllers/messagecode') ?>" method="POST">
                <div class="form-floating mb-3">
                    <input name="name" class="form-control" id="fullName" type="text" placeholder="Full Name" required />
                    <label for="fullName">Full Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="email" class="form-control" id="inputEmail" type="email" placeholder="E-Mail Address" required />
                    <label for="inputEmail">E-Mail Address</label>
                </div>
                <div class="form-floating mb-3 mb-md-0">
                    <textarea name="message" class="form-control" id="userMessage" type="text" placeholder="Leave a Message" required></textarea>
                    <label for="userMessage">Leave a Message</label>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <button type="submit" name="send_msg_btn" class="btn btn-primary btn-block">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 mb-3">
            <div class="d-flex flex-row bd-highlight mb-3">
                <div class="p-2 bd-highlight text-danger"><i class="far fa-envelope fa-2x"></i></div>
                <div class="p-2 bd-highlight fs-5">vimprakasholi@gmail.com</div>
            </div>
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight text-success"><i class="fas fa-phone-square fa-2x"></i></div>
                <div class="p-2 bd-highlight fs-5">9813456034</div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>