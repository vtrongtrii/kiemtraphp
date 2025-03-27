<?php
class AdminModel {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../config/database.php';
        $this->db = (new Database())->getConnection();
    }

    public function getAllAdmins() {
        $sql = "SELECT * FROM admins";
        $result = $this->db->query($sql);
        if ($result === false) {
            die("Lỗi truy vấn SQL: " . $this->db->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminById($id) {
        $sql = "SELECT * FROM admins WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            die("Lỗi truy vấn SQL: " . $this->db->error);
        }
        return $result->fetch_assoc();
    }

    public function addAdmin($username, $password, $fullname, $email, $role) {
        $sql = "INSERT INTO admins (username, password, fullname, email, role) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssss", $username, $password, $fullname, $email, $role);
        return $stmt->execute();
    }

    public function updateAdmin($id, $username, $password, $fullname, $email, $role) {
        $sql = "UPDATE admins 
                SET username = ?, password = ?, fullname = ?, email = ?, role = ? 
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssi", $username, $password, $fullname, $email, $role, $id);
        return $stmt->execute();
    }

    public function deleteAdmin($id) {
        $sql = "DELETE FROM admins WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function checkLogin($username, $password) {
        $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            die("Lỗi truy vấn SQL: " . $this->db->error);
        }
        return $result->fetch_assoc();
    }
}
?>