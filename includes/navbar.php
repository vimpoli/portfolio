 <div class="container bg-white my-4">
     <div class="text-dark d-flex">
         <div class="me-auto">
             <span class="small"> Follow me:
                 <a class="px-2" href="https://facebook.com/blanqui.auguste" target="_blank" rel="noopener noreferrer"><i style="color: #1877F2;" class="fab fa-facebook"></i></a>
                 <a class="px-2" href="https://www.linkedin.com/in/bhim-prakash-oli-ab48ba229/" target="_blank" rel="noopener noreferrer"><i style="color: #0077B5;" class="fab fa-linkedin-in"></i></a>
                 <a class="px-2" href="https://github.com/vimpoli" target="_blank" rel="noopener noreferrer"><i style="color: #171515;" class="fab fa-github"></i></a></span>
         </div>
         <div class="ms-auto">
             <span class="small" id="timeAndDate"></span>
         </div>
     </div>
 </div>
 <nav class="navbar navbar-expand-lg navbar-bg shadow-lg navbar-dark sticky-top container">
     <a href="<?= base_url('') ?>" class="navbar-brand ps-3 fw-bold">BHIMPRAKASHOLI</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon text-sm-success"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
             <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="<?= base_url('') ?>"><i class="fas fa-home"></i></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url('note') ?>">Notes</a>
             </li>
             <?php
                $query = mysqli_query($conn, "SELECT category,slug FROM categories WHERE status='1' AND navbar_status='1'");
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $category) {
                ?>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url('category/' . $category['slug']) ?>"><?= $category['category'] ?></a>
                     </li>
                 <?php
                    }
                }
                if (isset($_SESSION['auth_user'])) :
                    ?>
                 <li class="nav-item dropdown">
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
             <?php
                else :
                ?>
                 <li class="nav-item <?= $page == 'login.php' ? 'd-none' : '' ?>">
                     <a href="<?= base_url('login') ?>" class="nav-link btn bg-primary rounded-0 text-white">Login</a>
                 </li>
             <?php endif; ?>
         </ul>
     </div>
 </nav>