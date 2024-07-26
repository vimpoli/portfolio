<?php
if (!isset($_SESSION['auth'])) {
    $_SESSION['failure'] = 'Login to access dashboard';
    header("Location: ../login");
    exit(0);
}
