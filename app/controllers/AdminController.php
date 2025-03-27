<?php
class AdminController {
    private $model;

    public function __construct() {
        require_once __DIR__ . '/../models/AdminModel.php';
        $this->model = new AdminModel();
    }

    public function index() {
        $admins = $this->model->getAllAdmins();
        require_once __DIR__ . '/../views/admin/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            if ($this->model->addAdmin($username, $password, $fullname, $email, $role)) {
                header("Location: /quanlynhanvien/public/index.php?controller=admin&action=index");
            } else {
                echo "Lỗi khi thêm admin";
            }
        } else {
            require_once __DIR__ . '/../views/admin/add.php';
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            if ($this->model->updateAdmin($id, $username, $password, $fullname, $email, $role)) {
                header("Location: /quanlynhanvien/public/index.php?controller=admin&action=index");
            } else {
                echo "Lỗi khi sửa admin";
            }
        } else {
            $id = $_GET['id'];
            $admin = $this->model->getAdminById($id);
            require_once __DIR__ . '/../views/admin/edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        if ($this->model->deleteAdmin($id)) {
            header("Location: /quanlynhanvien/public/index.php?controller=admin&action=index");
        } else {
            echo "Lỗi khi xóa admin";
        }
    }
}
?>