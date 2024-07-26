<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1); ?>
                <div class="sb-sidenav-menu-heading">Core</div>
                <div class="card card-body border-0 my-3 mx-2 p-0 shadow-sm bg-light">
                    <a class="nav-link <?= $page == 'index.php' ? 'active' : '' ?>" href="./">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                </div>
                <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                    <a class="nav-link <?= $page == 'view-users.php' || $page == 'add-user.php' || $page == 'edit-user.php' ? 'active' : '' ?>" href="view-users">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Users
                    </a>
                </div>

                <?php if ($_SESSION['auth_role'] == '1') : ?>
                    <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                        <a class="nav-link <?= $page == 'view-messages.php' ? 'active' : '' ?>" href="view-messages">
                            <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                            Messages
                        </a>
                    </div>
                    <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                        <a class="nav-link <?= $page == 'view-comments.php' ? 'active' : '' ?>" href="view-comments">
                            <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                            Comments
                        </a>
                    </div>
                    <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                        <a class="nav-link <?= $page == 'view-ads.php' ? 'active' : '' ?>" href="view-ads">
                            <div class="sb-nav-link-icon"><i class="fas fa-ad"></i></div>
                            Ads
                        </a>
                    </div>
                    <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                        <a class="nav-link <?= $page == 'view-schedule.php' ? 'active' : '' ?>" href="view-schedule">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                            Schedule
                        </a>
                    </div>
                <?php endif; ?>

                <div class="sb-sidenav-menu-heading">Portfolio Interface</div>
                <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                    <a class="nav-link collapsed <?= $page == 'add-skill.php' || $page == 'view-skills.php' || $page == 'edit-skill.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProfSkills" aria-expanded="false" aria-controls="collapseProfSkills">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Skills
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </div>
                <div class="collapse <?= $page == 'add-skill.php' || $page == 'view-skills.php' || $page == 'edit-skill.php' ? 'show' : '' ?>" id="collapseProfSkills" aria-labelledby="ProfSkills" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <div class="card card-body border-0 my-1 p-0 me-2 shadow-sm">
                            <a class="nav-link <?= $page == 'add-skill.php' ? 'active' : '' ?>" href="add-skill">Add Skill</a>
                        </div>
                        <div class="card card-body border-0 mb-3 p-0 me-2 shadow-sm">
                            <a class="nav-link <?= $page == 'view-skills.php' || $page == 'edit-skill.php' ? 'active' : '' ?>" href="view-skills">View Skills</a>
                        </div>
                    </nav>
                </div>

                <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                    <a class="nav-link collapsed <?= $page == 'add-education.php' || $page == 'view-educations.php' || $page == 'edit-education.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEducation" aria-expanded="false" aria-controls="collapseEducation">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Qualifications
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </div>
                <div class="collapse <?= $page == 'add-education.php' || $page == 'view-educations.php' || $page == 'edit-education.php' ? 'show' : '' ?>" id="collapseEducation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <div class="card card-body border-0 my-1 p-0 me-2 shadow-sm">
                            <a class="nav-link <?= $page == 'add-education.php' ? 'active' : '' ?>" href="add-education">Add Education</a>
                        </div>
                        <div class="card card-body border-0 mb-3 p-0 me-2 shadow-sm">
                            <a class="nav-link <?= $page == 'view-educations.php' || $page == 'edit-education.php' ? 'active' : '' ?>" href="view-educations">View Educations</a>
                        </div>
                    </nav>
                </div>

                <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                    <a class="nav-link collapsed <?= $page == 'add-experience.php' || $page == 'view-experiences.php' || $page == 'edit-experience.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseExperiences" aria-expanded="false" aria-controls="collapseExperiences">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Experinces
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </div>
                <div class="collapse <?= $page == 'add-experience.php' || $page == 'view-experiences.php' || $page == 'edit-experience.php' ? 'show' : '' ?>" id="collapseExperiences" aria-labelledby="Experiences" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <div class="card card-body border-0 my-1 p-0 me-2 shadow-sm">
                            <a class="nav-link <?= $page == 'add-experience.php' ? 'active' : '' ?>" href="add-experience">Add Experince</a>
                        </div>
                        <div class="card card-body border-0 mb-3 p-0 me-2 shadow-sm">
                            <a class="nav-link <?= $page == 'view-experiences.php' || $page == 'edit-experience.php' ? 'active' : '' ?>" href="view-experiences">View Experinces</a>
                        </div>
                    </nav>
                </div>

                <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                    <a class="nav-link collapsed <?= $page == 'add-training.php' || $page == 'view-trainings.php' || $page == 'edit-training.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTrainings" aria-expanded="false" aria-controls="collapseTrainings">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Trainings
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </div>
                <div class="collapse <?= $page == 'add-training.php' || $page == 'view-trainings.php' || $page == 'edit-training.php' ? 'show' : '' ?>" id="collapseTrainings" aria-labelledby="Trainings" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <div class="card card-body border-0 my-1 p-0 me-2 shadow-sm">
                            <a class="nav-link <?= $page == 'add-training.php' ? 'active' : '' ?>" href="add-training">Add Training</a>
                        </div>
                        <div class="card card-body border-0 mb-1 p-0 me-2 shadow-sm">
                            <a class="nav-link <?= $page == 'view-trainings.php' || $page == 'edit-training.php' ? 'active' : '' ?>" href="view-trainings">View Trainings</a>
                        </div>
                    </nav>
                </div>
                <?php if ($_SESSION['auth_role'] == '1' || $_SESSION['auth_role'] == '2') : ?>
                    <div class="sb-sidenav-menu-heading">Blog Interface</div>
                    <?php if ($_SESSION['auth_role'] == '1') : ?>
                        <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                            <a class="nav-link collapsed <?= $page == 'add-category.php' || $page == 'view-categories.php' || $page == 'edit-category.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        </div>
                        <div class="collapse <?= $page == 'add-category.php' || $page == 'view-categories.php' || $page == 'edit-category.php' ? 'show' : '' ?>" id="collapseCategories" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <div class="card card-body border-0 my-1 p-0 me-2 shadow-sm">
                                    <a class="nav-link <?= $page == 'add-category.php' ? 'active' : '' ?>" href="add-category">Add Category</a>
                                </div>
                                <div class="card card-body border-0 mb-2 p-0 me-2 shadow-sm">
                                    <a class="nav-link <?= $page == 'view-categories.php' ? 'active' : '' ?>" href="view-categories">View Categories</a>
                                </div>
                            </nav>
                        </div>
                    <?php endif; ?>
                    <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                        <a class="nav-link collapsed <?= $page == 'add-post.php' || $page == 'view-posts.php' || $page == 'edit-post.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Posts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                    </div>
                    <div class="collapse <?= $page == 'add-post.php' || $page == 'view-posts.php' || $page == 'edit-post.php' ? 'show' : '' ?>" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <div class="card card-body border-0 my-1 p-0 me-2 shadow-sm">
                                <a class="nav-link <?= $page == 'add-post.php' ? 'active' : '' ?>" href="add-post">Add Post</a>
                            </div>
                            <div class="card card-body border-0 mb-2 p-0 me-2 shadow-sm">
                                <a class="nav-link <?= $page == 'view-posts.php' ? 'active' : '' ?>" href="view-posts">View Posts</a>
                            </div>
                        </nav>
                    </div>

                    <div class="card card-header border-0 mb-3 mx-2 p-0 shadow-sm bg-light">
                        <a class="nav-link collapsed <?= $page == 'add-note.php' || $page == 'view-notes.php' || $page == 'edit-note.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNotes" aria-expanded="false" aria-controls="collapseNotes">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Notes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                    </div>
                    <div class="collapse <?= $page == 'add-note.php' || $page == 'view-notes.php' || $page == 'edit-note.php' ? 'show' : '' ?>" id="collapseNotes" aria-labelledby="Notes" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <div class="card card-body border-0 my-1 p-0 me-2 shadow-sm">
                                <a class="nav-link <?= $page == 'add-note.php' ? 'active' : '' ?>" href="add-note">Add Note</a>
                            </div>
                            <div class="card card-body border-0 mb-3 p-0 me-2 shadow-sm">
                                <a class="nav-link <?= $page == 'view-notes.php' || $page == 'edit-note.php' ? 'active' : '' ?>" href="view-notes">View Notes</a>
                            </div>
                        </nav>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="sb-sidenav-footer bg-white">
            <div class="small">Logged in as:</div>
            <?= $_SESSION['auth_user']['user_name'] ?>
        </div>
    </nav>
</div>