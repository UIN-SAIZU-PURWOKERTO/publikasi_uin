<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .error-container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
        }
        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #3c8dbc;
            line-height: 1;
            margin-bottom: 20px;
            text-shadow: 4px 4px 0px #fff, 7px 7px 0px rgba(0,0,0,0.05);
        }
        .error-title {
            font-size: 28px;
            font-weight: 700;
            color: #343a40;
            margin-bottom: 15px;
        }
        .error-message {
            font-size: 18px;
            color: #6c757d;
            margin-bottom: 30px;
        }
        .btn-home {
            background-color: #3c8dbc;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(60, 141, 188, 0.3);
        }
        .btn-home:hover {
            background-color: #357ca5;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(60, 141, 188, 0.4);
        }
        .illustration {
            font-size: 100px;
            color: #dee2e6;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="illustration">
            <i class="fas fa-map-signs"></i>
        </div>
        <div class="error-code">404</div>
        <div class="error-title">Ups! Halaman Tidak Ditemukan</div>
        <div class="error-message">
            Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan. 
            Silakan kembali ke dashboard untuk melanjutkan aktivitas Anda.
        </div>
        <a href="<?= base_url('dashboard/authors') ?>" class="btn btn-home">
            <i class="fas fa-home mr-2"></i> Kembali ke Dashboard
        </a>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
