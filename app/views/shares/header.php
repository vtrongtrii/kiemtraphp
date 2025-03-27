<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .nav {
            margin-bottom: 20px;
        }
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quản lý nhân viên</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                   
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="/quanlynhanvien/public/index.php?controller=nhanvien&action=index">Danh sách nhân viên</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/quanlynhanvien/public/index.php?controller=nhanvien&action=add">Thêm nhân viên</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/quanlynhanvien/public/index.php?controller=admin&action=index">Quản lý admin</a>
                              </li>';
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/quanlynhanvien/public/index.php?controller=default&action=logout">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">