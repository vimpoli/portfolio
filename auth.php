<?php
if (isset($_SESSION['auth'])) {
    $_SESSION['success'] = 'You are already logged in';
    header("Location: ./");
    exit(0);
}
