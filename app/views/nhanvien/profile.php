<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
    exit();
}
require_once __DIR__ . '/../shares/header.php';
?>

<h2 class="my-4">THÔNG TIN CÁ NHÂN</h2>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $nhanvien['Ten_NV']; ?></h5>
        <p class="card-text"><strong>Mã Nhân Viên:</strong> <?php echo $nhanvien['Ma_NV']; ?></p>
        <p class="card-text"><strong>Giới tính:</strong> <?php echo $nhanvien['Phai']; ?></p>
        <p class="card-text"><strong>Nơi Sinh:</strong> <?php echo $nhanvien['Noi_Sinh']; ?></p>
        <p class="card-text"><strong>Phòng Ban:</strong> <?php echo $nhanvien['tenphong']; ?></p>
        <p class="card-text"><strong>Lương:</strong> <?php echo $nhanvien['Luong']; ?></p>
        <p class="card-text"><strong>Hình:</strong> <img src="<?php echo $nhanvien['hinh']; ?>" alt="Hình nhân viên"></p>
    </div>
</div>

<?php require_once __DIR__ . '/../shares/footer.php'; ?>