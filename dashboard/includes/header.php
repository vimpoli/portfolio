<?php
session_start();
include('config/dbconn.php');
include('auth.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Personal Website" />
    <meta name="author" content="auguste Blanqui" />
    <title><?= isset($title) ? $title : '' ?></title>
    <link rel="stylesheet" href="lib/datatables/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="lib/datatables/css/dataTables.bootstrap5.min.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="sb-nav-fixed">

    <?php include('includes/topbar.php'); ?>

    <div id="layoutSidenav">

        <?php include('includes/sidebar.php'); ?>

        <div id="layoutSidenav_content">
            <main>