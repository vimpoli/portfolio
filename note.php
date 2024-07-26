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
        $page_title = 'Notes';
        $meta_description = 'Notes Available';
        $meta_keywords = 'blanqui nepal, vim prakash oli';
    }
} else {
    $page_title = 'Notes';
    $meta_description = 'Notes Available';
    $meta_keywords = 'blanqui nepal, vim prakash oli';
}
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container my-4">
    <div class="row bg-white py-3">
        <div class="col-md-8 mb-4">
            <?php include('msg.php');
            $query = mysqli_query($conn, "SELECT title,note FROM notes WHERE status='1'");
            $count = '1';
            if (mysqli_num_rows($query) > 0) {
            ?>
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-sm border-light">
                        <thead class="table-success">
                            <tr>
                                <th>S.No.</th>
                                <th>Notes</th>
                                <th class="text-center">Download</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <?php
                            foreach ($query as $note) {
                                if (file_exists('uploads/notes/' . $note['note'])) :
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><a class="text-decoration-none" href="<?= base_url('uploads/notes/' . $note['note']) ?>"><?= $note['title'] ?></a></td>
                                        <td class="text-center"><a href="<?= base_url('uploads/notes/' . $note['note']) ?>" download><i class="fas fa-file-download text-success"></i></a></td>
                                    </tr>
                            <?php
                                endif;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
            ?>
                <h6>No Note Available</h6>
            <?php
            }
            ?>
        </div>
        <div class="col-md-4 mb-4">
            <?php
            $query = mysqli_query($conn, "SELECT title,slug FROM posts WHERE status='1' ORDER BY created_at DESC LIMIT 12");
            if (mysqli_num_rows($query) > 0) {
            ?>
                <div class="table-responsive-sm">
                    <table class="table table-borderless table-sm border-light">
                        <thead class="table-success">
                            <tr>
                                <th class="ps-3">Latest Posts</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <?php
                            foreach ($query as $post_item) {
                            ?>
                                <tr>
                                    <td class="ps-3">
                                        <span class="fs-5">&#8680;</span> <a class="text-decoration-none" href="<?= base_url('post/' . $post_item['slug']) ?>">
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
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>