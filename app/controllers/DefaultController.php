<?php
class DefaultController {
    private $adminModel;

    public function __construct() {
        require_once __DIR__ . '/../models/AdminModel.php';
        $this->adminModel = new AdminModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra đăng nhập admin
            $admin = $this->adminModel->checkLogin($username, $password);
            if ($admin) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'admin';
                header("Location: /quanlynhanvien/public/index.php?controller=nhanvien&action=index");
                exit();
            }

            // Nếu không tìm thấy tài khoản
            $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
            require_once __DIR__ . '/../views/nhanvien/login.php';
        } else {
            require_once __DIR__ . '/../views/nhanvien/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
    }
}
?>