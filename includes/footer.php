<div id="footer" class="container mb-4 py-3 bg-white">
    <div class="row">
        <div class="col-md-2">
            <h5>Categories</h5>
            <hr>
            <?php
            $query = mysqli_query($conn, "SELECT  category,slug FROM categories WHERE status='1' LIMIT 6");
            if (mysqli_num_rows($query) > 0) {
                foreach ($query as $category) {
            ?>
                    <p>
                        &#11177; <a class="text-decoration-none" href="<?= base_url('category/' . $category['slug']) ?>"><?= $category['category'] ?></a>
                    </p>
            <?php
                }
            }
            ?>
        </div>
        <div class="col-md-6">
            <h5>Latest Posts</h5>
            <hr>
            <div class="row">
                <?php
                $post = mysqli_query($conn, "SELECT * FROM posts WHERE status='1' ORDER BY created_at DESC LIMIT 6");
                if (mysqli_num_rows($post) > 0) {
                    foreach ($post as $post_item) {
                ?>
                        <div class="col-md-6">
                            <p class="">
                                &#11177; <a class="text-decoration-none" href="<?= base_url('post/' . $post_item['slug']) ?>"><?= $post_item['title'] ?></a>
                            </p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <h5>Profile Links</h5>
            <hr>
            <div class="d-flex flex-row bd-highlight">
                <div class="p-2 bd-highlight"><i style="color: #1877F2;" class="fab fa-facebook"></i></div>
                <div class="p-2 bd-highlight"><a class="text-decoration-none" href="https://facebook.com/blanqui.auguste" target="_blank">अगस्ट ब्लाङ्की</a></div>
            </div>
            <div class="d-flex flex-row bd-highlight">
                <div class="p-2 bd-highlight"><i style="color: #0077B5;" class="fab fa-linkedin-in"></i></div>
                <div class="p-2 bd-highlight"><a class="text-decoration-none" href="https://www.linkedin.com/in/bhim-prakash-oli-ab48ba229/" target="_blank">Bhim Prakash Oli</a></div>
            </div>
            <div class="d-flex flex-row bd-highlight">
                <div class="p-2 bd-highlight"><i style="color: #171515 ;" class="fab fa-github"></i></div>
                <div class="p-2 bd-highlight"><a class="text-decoration-none" href="https://github.com/vimpoli" target="_blank">vimpoli</a></div>
            </div>
        </div>
    </div>
    <hr>
    <div class="text-center small">
        <p class="text-muted">Copyright &copy; <?= date('Y') ?> &mid; All rights reserved</p>
        <p class="text-muted">Designed by: <a class="text-decoration-none fw-bold" href="https://bhimprakasholi.com.np">Bhim Oli</a></p>
    </div>
</div>