<?php
include('dashboard/config/dbconn.php');

if (isset($_GET['title'])) {
    $slug = mysqli_real_escape_string($conn, $_GET['title']);
    $post = mysqli_query($conn, "SELECT slug,meta_title,meta_description,meta_keyword FROM posts WHERE slug='$slug' LIMIT 1");

    if (mysqli_num_rows($post) > 0) {
        $post_item = mysqli_fetch_array($post);

        $page_title = $post_item['meta_title'];
        $meta_description = $post_item['meta_description'];
        $meta_keywords = $post_item['meta_keyword'];
    } else {
        $page_title = 'Single Post';
        $meta_description = 'Single Post';
        $meta_keywords = 'blanqui nepal, vim prakash oli';
    }
} else {
    $page_title = 'Single Post';
    $meta_description = 'Single post';
    $meta_keywords = 'blanqui nepal, vim prakash oli';
}
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 bg-white">
                <?php include('msg.php'); ?>
                <?php
                if (isset($_GET['title'])) {
                    $slug = mysqli_real_escape_string($conn, $_GET['title']);
                    $query = mysqli_query($conn, "SELECT * FROM posts WHERE slug='$slug' LIMIT 1");

                    if (mysqli_num_rows($query) > 0) {
                        foreach ($query as $post_item) {
                ?>
                            <div class="mb-4 border-0">
                                <h4 class="fw-bold py-2 mb-0"><?= $post_item['title'] ?></h4>
                                <div class="mt-0">
                                    <p class="py-1 bg-primary text-light ps-3 rounded"><?= $post_item['author'] != null ? $post_item['author'] : 'Author' ?> &nbsp;&nbsp;&nbsp; &mid; &nbsp;&nbsp;&nbsp;
                                        <i class="fas fa-calendar-alt"></i> <?= date('M d Y', strtotime($post_item['created_at'])) ?>
                                    </p>
                                    <div class="post-desc mb-5">
                                        <?= $post_item['description']; ?>
                                    </div>
                                    <?php
                                    $post_id = $post_item['id'];
                                    $query = mysqli_query($conn, "SELECT name,comment FROM comments WHERE post_id = '$post_id' AND status='1' ORDER BY created_at DESC LIMIT 5");

                                    if (mysqli_num_rows($query) > 0) {
                                    ?>
                                        <div class="card border-0 mb-5">
                                            <div class="pt-1 bg-danger my-0 mb-2"></div>
                                            <h6 class="px-3">Latest Comments</h6>
                                            <div class="pt-1 bg-danger my-0 mb-3"></div>
                                            <?php
                                            foreach ($query as $comment) {
                                            ?>
                                                <div class="card-body rounded border-0 mb-2 py-2 px-3 shadow-sm bg-light">
                                                    <div class="row">
                                                        <div class="col-md-2"><strong> <?= $comment['name'] ?> </strong></div>
                                                        <div class="col-md-10"><?= $comment['comment'] ?></div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <hr>
                                    <hr>
                                    <div class="mt-3 text-center">
                                        <a class="disabled text-decoration-none fs-4"><i class="fas fa-share-alt"></i></a> <span class="fs-4 ms-2">[</span>
                                        <a class="mx-2 fs-4" target="_blank" href="https://facebook.com/sharer.php?u=<?= $slug ?>"><i class="fab fa-facebook"></i></a>
                                        <a class="mx-2 fs-4" target="_blank" href="https://twitter.com/share?text=&url=<?= $slug ?>"><i class="fab fa-twitter"></i></a> <span class="fs-4">]</span>
                                    </div>
                                    <hr>
                                    <hr>
                                    <div class="mt-5">
                                        <p class="mb-4 bg-primary ps-3 py-1 rounded-3 text-light">Leave A Reply</p>
                                        <form action="<?= base_url('controllers/commentcode') ?>" method="POST">
                                            <div class="row">
                                                <input type="hidden" name="post_id" value="<?= $post_item['id'] ?>">
                                                <input type="hidden" name="slug" value="<?= $post_item['slug'] ?>">
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="name" class="form-control" id="inputName" type="text" placeholder="Full Name" required />
                                                        <label for="inputName">Full Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea name="comment" class="form-control" id="inputMsg" placeholder="Write your comment"></textarea>
                                                        <label for="inputMsg">Write your comment</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" name="user_comment_btn" class="btn btn-sm btn-primary">Post Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <h6>No Post Available</h6>
                    <?php
                    }
                } else {
                    ?>
                    <h6>No Such URL Found</h6>
                <?php
                }
                ?>
            </div>
            <div class="col-md-4">
                <div class="card border-0 mb-3 rounded-0">
                    <h5 class="bg-primary text-white fw-bold py-1 ps-3">Latest Posts</h5>
                    <div class="card-body py-2 pt-0">
                        <?php
                        $query = mysqli_query($conn, "SELECT title,slug FROM posts WHERE status='1' ORDER BY created_at DESC LIMIT 6");
                        if (mysqli_num_rows($query) > 0) {
                        ?>
                            <div class="table-responsive-sm">
                                <table class="table table-hover table-sm border-light">
                                    <tbody>
                                        <?php
                                        foreach ($query as $post_item) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">&#11177;</span> <a class="text-decoration-none" href="<?= base_url('post/' . $post_item['slug']) ?>">
                                                        <?= $post_item['title'] ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>