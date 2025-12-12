<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= 'E-Office | '.$title ?></title>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.ico" />
    <style>
    .login-page {
        background-image: url('<?= base_url('assets/images/bg.jpg') ?>');
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-info">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>UIN SAIZU PURWOKERTO</b></a>
            </div>
            <div class="card-body">

                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/images/logo.png') ?>"
                        alt="User profile picture">
                </div><br>

                <p class="login-box-msg">PUBLIKASI</p>
                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                <div class="flash-salah" data-flashdata="<?php echo $this->session->flashdata('flashsalah'); ?>"></div>
                <div class="flash-info" data-flashdata="<?php echo $this->session->flashdata('flashinfo'); ?>"></div>