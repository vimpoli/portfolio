<?php
$title = 'Dashboard - Edit Ads';

include('includes/header.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Advertisements</li>
                <li class="breadcrumb-item text-dark">Edit</li>
            </ol>
            <?php
            include('../msg.php');
            ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="btn btn-sm btn-primary text-decoration-none fw-bold float-end" href="view-ads">Ads</a>
                </div>
                <div class="card-body">
                    <?php
                    $ads_id = $_GET['id'];
                    $query = mysqli_query($conn, "SELECT * FROM ads WHERE id='$ads_id' LIMIT 1");
                    if (mysqli_num_rows($query) > 0) {
                        $ads = mysqli_fetch_array($query);
                    ?>
                        <form action="controllers/adcode" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label>Ad Type</label>
                                    <select name="ad_type" class="form-control">
                                        <option>--Select Type--</option>
                                        <option value="1" <?= $ads['ads_type'] == '1' ? 'selected' : '' ?>>Banner1</option>
                                        <option value="2" <?= $ads['ads_type'] == '2' ? 'selected' : '' ?>>Banner2</option>
                                        <option value="3" <?= $ads['ads_type'] == '3' ? 'selected' : '' ?>>Feature</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Insert URL</label>
                                    <input class="form-control" type="text" name="url" value="<?= $ads['url'] ?>">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Upload</label>
                                    <input type="hidden" name="old_ads" value="<?= $ads['ads'] ?>" />
                                    <input class="form-control" type="file" name="ads" accept="image/*" />
                                    <?php if ($ads['ads'] != NULL && file_exists('../uploads/ads/' . $ads['ads'])) : ?>
                                        <img class="img-fluid shadow mt-2 rounded" src="../uploads/ads/<?= $ads['ads'] ?>" alt="ads">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status" <?= $ads['status'] == '1' ? 'checked' : '' ?> />
                                </div>
                            </div>
                            <hr class="pt-1 bg-secondary">
                            <button class="btn btn-sm btn-primary float-end" type="submit" name="update_ads_btn" value="<?= $ads_id ?>">Update</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <h4 class="text-center">No Record Found</h4>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>