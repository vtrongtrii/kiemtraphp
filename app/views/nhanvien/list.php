<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
    exit();
}
require_once __DIR__ . '/../shares/header.php';
?>

<h2 class="my-4">THÔNG TIN NHÂN VIÊN</h2>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Giới tính</th>
            <th>Nơi Sinh</th>
            <th>Tên Phòng</th>
            <th>Lương</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($nhanviens as $nhanvien): ?>
        <tr>
            <td><?php echo $nhanvien['Ma_NV']; ?></td>
            <td><?php echo $nhanvien['Ten_NV']; ?></td>

            <!-- Cột Giới tính hiển thị hình ảnh -->
            <td class="text-center">
                <?php
                $gender = strtolower(trim($nhanvien['Phai'])); // Chuyển về chữ thường và loại bỏ khoảng trắng
                if ($gender === 'nu') {
                    $imagePath = "/quanlynhanvien/public/content/images/woman.jpg";
                } else {
                    $imagePath = "/quanlynhanvien/public/content/images/man.jpg";
                }
                ?>
                <img src="<?php echo $imagePath; ?>" alt="Ảnh nhân viên" width="40" height="40"
                     class="rounded-circle" onerror="this.src='/quanlynhanvien/public/content/images/default.jpg'">
            </td>

            <td><?php echo $nhanvien['Noi_Sinh']; ?></td>
            <td><?php echo $nhanvien['Ten_Phong']; ?></td>
            <td><?php echo $nhanvien['Luong']; ?></td>

            <td>
                <a href="/quanlynhanvien/public/index.php?controller=nhanvien&action=edit&manv=<?php echo $nhanvien['Ma_NV']; ?>" 
                   class="btn btn-sm btn-primary">Sửa</a>
                <a href="/quanlynhanvien/public/index.php?controller=nhanvien&action=delete&manv=<?php echo $nhanvien['Ma_NV']; ?>" 
                   class="btn btn-sm btn-danger" 
                   onclick="return confirm('Bạn có chắc muốn xóa nhân viên này?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

</table>
<nav>
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?controller=nhanvien&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<?php require_once __DIR__ . '/../shares/footer.php'; ?>