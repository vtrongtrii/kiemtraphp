<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
    exit();
}
require_once __DIR__ . '/../shares/header.php';

// Handle validation errors
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$old = isset($_SESSION['old']) ? $_SESSION['old'] : [];
unset($_SESSION['errors'], $_SESSION['old']);
?>

<h2 class="my-4">THÊM NHÂN VIÊN</h2>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="POST" action="/quanlynhanvien/public/index.php?controller=nhanvien&action=add">
    <div class="mb-3">
        <label for="manv" class="form-label">Mã Nhân Viên</label>
        <input type="text" class="form-control" id="manv" name="manv" value="<?php echo htmlspecialchars($old['manv'] ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label for="tennv" class="form-label">Tên Nhân Viên</label>
        <input type="text" class="form-control" id="tennv" name="tennv" value="<?php echo htmlspecialchars($old['tennv'] ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label for="phai" class="form-label">Giới tính</label>
        <select class="form-select" id="phai" name="phai" required>
            <option value="">-- Chọn giới tính --</option>
            <option value="NAM" <?php echo (isset($old['phai']) && $old['phai'] === 'NAM') ? 'selected' : ''; ?>>Nam</option>
            <option value="NỮ" <?php echo (isset($old['phai']) && $old['phai'] === 'NỮ') ? 'selected' : ''; ?>>Nữ</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="noisinh" class="form-label">Nơi Sinh</label>
        <input type="text" class="form-control" id="noisinh" name="noisinh" value="<?php echo htmlspecialchars($old['noisinh'] ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label for="maphong" class="form-label">Phòng Ban</label>
        <select class="form-select" id="maphong" name="maphong" required>
            <option value="">-- Chọn phòng ban --</option>
            <?php foreach ($phongbans as $phongban): ?>
                <option value="<?php echo $phongban['Ma_Phong']; ?>" <?php echo (isset($old['maphong']) && $old['maphong'] === $phongban['Ma_Phong']) ? 'selected' : ''; ?>>
                    <?php echo $phongban['Ten_Phong']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="luong" class="form-label">Lương</label>
        <input type="number" class="form-control" id="luong" name="luong" value="<?php echo htmlspecialchars($old['luong'] ?? ''); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

<?php require_once __DIR__ . '/../shares/footer.php'; ?>