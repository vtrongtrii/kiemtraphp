<?php
class NhanVienModel {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../config/database.php';
        $this->db = (new Database())->getConnection();
    }

    public function getAllNhanVien() {
        $sql = "SELECT nv.Ma_NV, nv.Ten_NV, nv.Phai, nv.Noi_Sinh, nv.Luong, pb.Ten_Phong 
                FROM nhanvien nv 
                JOIN phongban pb ON nv.Ma_Phong = pb.Ma_Phong";
        $result = $this->db->query($sql);
        
        if ($result === false) {
            die("Lỗi truy vấn SQL: " . $this->db->error);
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function countNhanVien() {
        $sql = "SELECT COUNT(*) as total FROM nhanvien";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getNhanVienByPage($start, $limit) {
        $sql = "SELECT nv.Ma_NV, nv.Ten_NV, nv.Phai, nv.Noi_Sinh, nv.Luong, pb.Ten_Phong 
                FROM nhanvien nv 
                JOIN phongban pb ON nv.Ma_Phong = pb.Ma_Phong 
                LIMIT ?, ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $start, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
        
    public function getNhanVienById($manv) {
        $sql = "SELECT nv.*, pb.Ten_Phong 
                FROM nhanvien nv 
                JOIN phongban pb ON nv.Ma_Phong = pb.Ma_Phong 
                WHERE nv.Ma_NV = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $manv);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            die("Lỗi truy vấn SQL: " . $this->db->error);
        }
        return $result->fetch_assoc();
    }

    public function addNhanVien($manv, $tennv, $phai, $noisinh, $maphong, $luong) {
        $sql = "INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssi", $manv, $tennv, $phai, $noisinh, $maphong, $luong);
        return $stmt->execute();
    }

    public function updateNhanVien($manv, $tennv, $phai, $noisinh, $maphong, $luong) {
        $sql = "UPDATE nhanvien 
                SET Ten_NV = ?, Phai = ?, Noi_Sinh = ?, Ma_Phong = ?, Luong = ? 
                WHERE Ma_NV = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssssis", $tennv, $phai, $noisinh, $maphong, $luong, $manv);
        return $stmt->execute();
    }

    public function deleteNhanVien($manv) {
        $sql = "DELETE FROM nhanvien WHERE Ma_NV = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $manv);
        return $stmt->execute();
    }

    public function getAllPhongBan() {
        $sql = "SELECT * FROM phongban";
        $result = $this->db->query($sql);
        if ($result === false) {
            die("Lỗi truy vấn SQL: " . $this->db->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>