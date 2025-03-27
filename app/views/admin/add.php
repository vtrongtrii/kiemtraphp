<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
    exit();
}
require_once __DIR__ . '/../shares/header.php';
?>

<h2 class="my-4">THÊM ADMIN</h2>
<form method="POST" action="/quanlynhanvien/public/index.php?controller=admin&action=add">
    <div class="mb-3">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="fullname" class="form-label">Họ tên</label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Vai trò</label>
        <input type="text" class="form-control" id="role" name="role" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

<?php require_once __DIR__ . '/../shares/footer.php'; ?>