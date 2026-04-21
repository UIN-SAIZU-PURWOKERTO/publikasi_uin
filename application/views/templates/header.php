<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= 'PUBLIKASI | '.$title ?></title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet"
        href="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <!-- <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.ico" /> -->

    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/styleAuthorDetail.css">
    <style>
    .blink {
        animation: blinker 1s linear infinite;
    }

    .blink2 {
        animation: blinker 0.9s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }

    .border-primary {
        border: 1px solid #007bff;
    }

    .border-success {
        border: 1px solid #5cb85c;
    }

    .border-warning {
        border: 1px solid #f0ad4e;
    }

    .border-danger {
        border: 1px solid #d9534f;
        /* warna biru primer */
    }
    </style>

    <style>
    .aff-container {
        background: #ffffff;
        padding: 34px;
        border-radius: 22px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        border: 1px solid rgba(230, 230, 230, 0.7);
        max-width: 1080px;
        margin: 2px auto;
        transition: 0.3s;
    }

    .aff-container:hover {
        transform: translateY(-2px);
    }

    .aff-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 22px;
    }

    .aff-title {
        font-size: 26px;
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 5px;
        line-height: 1.2;
    }

    .aff-abbrev {
        font-size: 17px;
        font-weight: 600;
        color: #0d6efd;
    }

    .aff-location {
        font-size: 14px;
        margin-top: 4px;
        color: #666;
    }

    .aff-link {
        color: #0c5cf0;
        font-weight: 600;
        border: 1px solid #d7e3ff;
        padding: 8px 14px;
        border-radius: 12px;
        background: #f4f7ff;
        transition: 0.2s;
        font-size: 14px;
    }

    .aff-link:hover {
        background: #eaf0ff;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-top: 28px;
    }

    .stat-card {
        padding: 24px;
        border-radius: 18px;
        background: #f7f9ff;
        border: 1px solid #e3e9ff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
    }

    .stat-title {
        font-weight: 700;
        color: #1f3b8a;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .label {
        font-weight: 600;
        color: #333;
        font-size: 14px;
        margin-bottom: 6px;
    }

    .progress-bar {
        width: 100%;
        background: #ececec;
        height: 9px;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 15px;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #6aa4ff, #1e8cf5);
        width: 0;
        border-radius: 20px;
        transition: width 1.4s cubic-bezier(.4, 0, .2, 1);
    }

    .progress-animate .progress-fill {
        width: var(--value);
    }

    .chart-wrapper {
        background: white;
        padding: 18px;
        border-radius: 16px;
        border: 1px solid #e3e9ff;
    }
    </style>
</head>

<body class='hold-transition layout-top-nav layout-fixed layout-navbar-fixed text-sm'>

    <div class="wrapper">

        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
        <div class="flash-salah" data-flashdata="<?php echo $this->session->flashdata('flashsalah'); ?>"></div>
        <div class="flash-info" data-flashdata="<?php echo $this->session->flashdata('flashinfo'); ?>"></div>