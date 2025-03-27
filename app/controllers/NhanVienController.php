<?php
class NhanVienController {
    private $model;

    public function __construct() {
        require_once __DIR__ . '/../models/NhanVienModel.php';
        $this->model = new NhanVienModel();
    }

    public function index() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
            exit();
        }
    
        $limit = 5; // Số nhân viên mỗi trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $limit;
    
        $totalNhanVien = $this->model->countNhanVien();
        $totalPages = ceil($totalNhanVien / $limit);
    
        $nhanviens = $this->model->getNhanVienByPage($start, $limit);
        
        require_once __DIR__ . '/../views/nhanvien/list.php';
    }
    
    
    public function add() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $manv = $_POST['manv'];
            $tennv = $_POST['tennv'];
            $phai = $_POST['phai'];
            $noisinh = $_POST['noisinh'];
            $maphong = $_POST['maphong'];
            $luong = $_POST['luong'];

            if ($this->model->addNhanVien($manv, $tennv, $phai, $noisinh, $maphong, $luong)) {
                header("Location: /quanlynhanvien/public/index.php?controller=nhanvien&action=index");
            } else {
                echo "Lỗi khi thêm nhân viên";
            }
        } else {
            $phongbans = $this->model->getAllPhongBan();
            require_once __DIR__ . '/../views/nhanvien/add.php';
        }
    }

    public function edit() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $manv = $_POST['manv'];
            $tennv = $_POST['tennv'];
            $phai = $_POST['phai'];
            $noisinh = $_POST['noisinh'];
            $maphong = $_POST['maphong'];
            $luong = $_POST['luong'];

            if ($this->model->updateNhanVien($manv, $tennv, $phai, $noisinh, $maphong, $luong)) {
                header("Location: /quanlynhanvien/public/index.php?controller=nhanvien&action=index");
            } else {
                echo "Lỗi khi sửa nhân viên";
            }
        } else {
            $manv = $_GET['manv'];
            $nhanvien = $this->model->getNhanVienById($manv);
            $phongbans = $this->model->getAllPhongBan();
            require_once __DIR__ . '/../views/nhanvien/edit.php';
        }
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: /quanlynhanvien/public/index.php?controller=default&action=login");
            exit();
        }
        $manv = $_GET['manv'];
        if ($this->model->deleteNhanVien($manv)) {
            header("Location: /quanlynhanvien/public/index.php?controller=nhanvien&action=index");
        } else {
            echo "Lỗi khi xóa nhân viên";
        }
    }
}
?>