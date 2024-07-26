<?php
if (isset($_SESSION['failure'])) {
?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <Strong><?= $_SESSION['failure']; ?> </Strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php
  unset($_SESSION['failure']);
} elseif (isset($_SESSION['success'])) {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <Strong><?= $_SESSION['success']; ?> </Strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php
  unset($_SESSION['success']);
}
?>