<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
    exit();
}
require_once __DIR__ . '/../shares/header.php';
?>

<h2 class="my-4">SỬA NHÂN VIÊN</h2>
<form method="POST" action="/quanlynhanvien/public/index.php?controller=nhanvien&action=edit">
    <input type="hidden" name="manv" value="<?php echo $nhanvien['Ma_NV']; ?>">
    <div class="mb-3">
        <label for="tennv" class="form-label">Tên Nhân Viên</label>
        <input type="text" class="form-control" id="tennv" name="tennv" value="<?php echo $nhanvien['Ten_NV']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="phai" class="form-label">Giới tính</label>
        <select class="form-select" id="phai" name="phai" required>
            <option value="NAM" <?php echo $nhanvien['Phai'] == 'NAM' ? 'selected' : ''; ?>>Nam</option>
            <option value="NU" <?php echo $nhanvien['Phai'] == 'NU' ? 'selected' : ''; ?>>NU</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="noisinh" class="form-label">Nơi Sinh</label>
        <input type="text" class="form-control" id="noisinh" name="noisinh" value="<?php echo $nhanvien['Noi_Sinh']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="maphong" class="form-label">Phòng Ban</label>
        <select class="form-select" id="maphong" name="maphong" required>
            <?php foreach ($phongbans as $phongban): ?>
                <option value="<?php echo $phongban['Ma_Phong']; ?>" <?php echo $nhanvien['Ma_Phong'] == $phongban['Ma_Phong'] ? 'selected' : ''; ?>>
                    <?php echo $phongban['Ten_Phong']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="luong" class="form-label">Lương</label>
        <input type="number" class="form-control" id="luong" name="luong" value="<?php echo $nhanvien['Luong']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

<?php require_once __DIR__ . '/../shares/footer.php'; ?>