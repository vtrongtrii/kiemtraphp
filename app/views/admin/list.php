<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
    exit();
}
require_once __DIR__ . '/../shares/header.php';
?>

<h2 class="my-4">QUẢN LÝ ADMIN</h2>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?php echo $admin['Id']; ?></td>
                <td><?php echo $admin['username']; ?></td>
                <td><?php echo $admin['fullname']; ?></td>
                <td><?php echo $admin['email']; ?></td>
                <td><?php echo $admin['role']; ?></td>
                <td>
                    <a href="/quanlynhanvien/public/index.php?controller=admin&action=edit&id=<?php echo $admin['Id']; ?>" class="btn btn-sm btn-primary">Sửa</a>
                    <a href="/quanlynhanvien/public/index.php?controller=admin&action=delete&id=<?php echo $admin['Id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa admin này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../shares/footer.php'; ?>