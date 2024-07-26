<?php 
    class Model {
        protected $conn;
        public function __construct()
        {
            $this -> conn = new mysqli('localhost', 'root', '', 'webdecor');
            if ($this -> conn -> connect_error)
            {
                die($this -> conn -> connect_error);
            }    
            $this -> conn -> set_charset("utf8");
        }

        // Đăng nhập
        public function doLogin() {
            $query = "SELECT * FROM dbl_user WHERE email = '".$_POST['email']."' AND pass = '".$_POST['pass']."'";
            $result = mysqli_query($this -> conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
            return false;
        }

        // Đăng ký
        public function addUser() {
            $level = 2;
            $query = "INSERT INTO dbl_user 
                      VALUES ('', '".$_POST['name']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['address']."', '".$_POST['pass']."', '".$level."')";
            $result = $this -> conn -> query($query);
            if ($result) return true;
            return false;
        }

        // Quên mật khẩu
        public function forgotpass() {
            $query = "UPDATE dbl_user SET pass = '".$_POST['pass']."' WHERE email = '".$_POST['email']."'";
            return mysqli_query($this -> conn, $query);
        }
        
        // Lấy danh sách nhân viên
        public function getNV() {
            $query = "SELECT * FROM dbl_nhanvien";
            return mysqli_query($this -> conn, $query);
        }

        // Lấy danh sách nhà thiết kế
        public function getNTK() {
            $query = "SELECT * FROM dbl_nhathietke";
            return mysqli_query($this -> conn, $query);
        }

        // Thêm nhân viên
        public function addNV() {
            $query = "INSERT INTO dbl_nhanvien 
                      VALUES ('' , '".$_POST['manv']."', '".$_POST['tennv']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['address']."')";
            $result = $this -> conn -> query($query);
            if ($result) return true;
            return false;
        }

        // Xóa nhân viên
        public function deleteNV() {
            $query = "DELETE FROM dbl_nhanvien WHERE manv = '".$_GET['manv']."'";
            return mysqli_query($this -> conn, $query);
        }

        // Sửa nhân viên
        public function updateNV() {
            $query = "UPDATE dbl_nhanvien 
                      SET tennv = '".$_POST['tennv']."', email = '".$_POST['email']."', phone = '".$_POST['phone']."', address = '".$_POST['address']."' 
                      WHERE manv = '".$_POST['manv']."'";
            $result = $this -> conn -> query($query);
            if ($result) return true;
            return false;
        }

         // Thêm nhà thiết kế
         public function addNTK() {
            $query = "INSERT INTO dbl_nhathietke
                      VALUES ('' , '".$_POST['mantk']."', '".$_POST['tenntk']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['address']."')";
            $result = $this -> conn -> query($query);
            if ($result) return true;
            return false;
        }

        // Xóa nhà thiết kế
        public function deleteNTK() {
            $query = "DELETE FROM dbl_nhathietke WHERE mantk = '".$_GET['mantk']."'";
            return mysqli_query($this -> conn, $query);
        }

        // Sửa nhà thiết kế
        public function updateNTK() {
            $query = "UPDATE dbl_nhathietke
                      SET tenntk = '".$_POST['tenntk']."', email = '".$_POST['email']."', phone = '".$_POST['phone']."', address = '".$_POST['address']."' 
                      WHERE mantk = '".$_POST['mantk']."'";
            $result = $this -> conn -> query($query);
            if ($result) return true;
            return false;
        }

        // Lấy dữ liệu toàn bộ sản phẩm
        public function getAllSp() {
            $query = "SELECT * FROM dbl_sanpham";
            return mysqli_query($this -> conn, $query);
        }

        public function getSP($temp) {
            $query = "SELECT * FROM dbl_sanpham WHERE masp LIKE '".$temp."%'";
            return mysqli_query($this -> conn, $query);
        }

        // Thêm sản phẩm
        public function addSP($test ,$imgname) {
            $query = "INSERT INTO dbl_sanpham
                      VALUES ('".$test['masp']."', '".$test['giasp']."', '".$imgname."')";
            $result = $this -> conn -> query($query);
            if ($result) return true;
            return false;
        }

        // Xóa sản phẩm
        public function deleteSP() {
            $query = "DELETE FROM dbl_sanpham WHERE masp = '".$_GET['masp']."'";
            return mysqli_query($this -> conn, $query);
        }

        // Sửa sản phẩm
        public function updateSP($test, $anh) {
            $query = "UPDATE dbl_sanpham
                      SET giasp = '".$test['giasp']."', img = '".$anh."'
                      WHERE masp = '".$test['masp']."'";
            $result = $this -> conn -> query($query);
            if ($result) return true;
            return false;
        }

        // Tìm kiếm sản phẩm
        public function searchSP() {
            $query = "SELECT * FROM dbl_sanpham WHERE masp LIKE '".$_POST['searchsp']."%'";
            return mysqli_query($this -> conn, $query);
        }

        // Tìm kiếm nhà thiết kế
        public function searchNTK() {
            $query = "SELECT * FROM dbl_nhathietke WHERE mantk = '".$_POST['searchntk']."' || tenntk LIKE '%".$_POST['searchntk']."%'";
            return mysqli_query($this -> conn, $query);
        }

        // Tìm kiếm nhân viên
        public function searchNV() {
            $query = "SELECT * FROM dbl_nhanvien WHERE manv = '".$_POST['searchnv']."' || tennv LIKE '%".$_POST['searchnv']."%'";
            return mysqli_query($this -> conn, $query);
        }

        // Tìm kiếm sản phẩm Page User
        public function searchProductUser() {
            $query = "SELECT * FROM dbl_sanpham WHERE masp LIKE '".$_POST['searchspuser']."%'";
            return mysqli_query($this -> conn, $query);
        }
    }
?>