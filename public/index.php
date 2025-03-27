<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'default';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($controller) {
    case 'default':
        require_once __DIR__ . '/../app/controllers/DefaultController.php';
        $controller = new DefaultController();
        if ($action == 'login') {
            $controller->login();
        } elseif ($action == 'logout') {
            $controller->logout();
        }
        break;

    case 'nhanvien':
        require_once __DIR__ . '/../app/controllers/NhanVienController.php';
        $controller = new NhanVienController();
        if ($action == 'index') {
            $controller->index();
        } elseif ($action == 'add') {
            $controller->add();
        } elseif ($action == 'edit') {
            $controller->edit();
        } elseif ($action == 'delete') {
            $controller->delete();
        }
        break;

    case 'admin':
        require_once __DIR__ . '/../app/controllers/AdminController.php';
        $controller = new AdminController();
        if ($action == 'index') {
            $controller->index();
        } elseif ($action == 'add') {
            $controller->add();
        } elseif ($action == 'edit') {
            $controller->edit();
        } elseif ($action == 'delete') {
            $controller->delete();
        }
        break;

    default:
        echo "Controller không tồn tại";
        break;
}
?>