<?php
session_start();
include('dashboard/config/dbconn.php');
include('config.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php if (isset($meta_description)) echo $meta_description; ?>">
    <meta name="keywords" content="<?php if (isset($meta_keywords)) echo $meta_keywords; ?>">
    <meta name="author" content="Bhim Prakash Oli">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($page_title) ? $page_title : '' ?></title>
    <link rel="stylesheet" href="<?= base_url('lib/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('lib/fontawesome/css/fontawesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">
</head>

<body>