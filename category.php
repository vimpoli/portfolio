<?php
include('dashboard/config/dbconn.php');

if (isset($_GET['title'])) {
    $slug = mysqli_real_escape_string($conn, $_GET['title']);
    $category = mysqli_query($conn, "SELECT slug,meta_title,meta_description,meta_keyword FROM categories WHERE slug='$slug' LIMIT 1");
    if (mysqli_num_rows($category) > 0) {
        $category_item = mysqli_fetch_assoc($category);

        $page_title = $category_item['meta_title'];
        $meta_description = $category_item['meta_description'];
        $meta_keywords = $category_item['meta_keyword'];
    } else {
        $page_title = 'Category';
        $meta_description = 'Category';
        $meta_keywords = 'blanqui nepal, vim prakash oli';
    }
} else {
    $page_title = 'Category';
    $meta_description = 'Category';
    $meta_keywords = 'blanqui nepal, vim prakash oli';
}

include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container my-4">
    <div class="row bg-white">
        <?php
        if (isset($_GET['title'])) {
            $slug = mysqli_real_escape_string($conn, $_GET['title']);
            $category = mysqli_query($conn, "SELECT id,slug FROM categories WHERE slug='$slug' LIMIT 1");
            if (mysqli_num_rows($category) > 0) {
                $res = mysqli_fetch_array($category);
                $cat_id = $res['id'];

                $post = mysqli_query($conn, "SELECT author,title,slug,created_at FROM posts WHERE category_id='$cat_id'");
                if (mysqli_num_rows($post) > 0) {
                    foreach ($post as $post_item) {
        ?>
                        <div class="col-md-4 p-3">
                            <div class="card mb-3 border-0 rounded-0 shadow">
                                <div class="card-body">
                                    <a href="<?= base_url('post/' . $post_item['slug']) ?>" class="text-decoration-none">
                                        <h5><?= $post_item['title']; ?></h5>
                                    </a>
                                </div>
                                <label class="ps-3 py-1 bg-primary text-light">
                                    <span><?= $post_item['author'] ?></span>
                                    <span class="float-end pe-3"><?= date('d-M-Y', strtotime($post_item['created_at'])) ?></span>
                                </label>
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
                <h6>No Such Category Found</h6>
            <?php
            }
        } else {
            ?>
            <h6>No Such URL Found</h6>
        <?php
        }
        ?>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>