<?php
    require_once "Models/model.php";
    require_once "Views/view.php";

    class controller {
        var $model, $view;
        function __construct()
        {
            $this -> model = new Model();
            $this -> view = new View();
        }

        // Home
        public function getPageHome() {
            $this -> view -> getPageHome();
        }

        public function getPagePhongKhach() {
            $this -> view -> getPagePhongKhach();
        }

        public function getPagePhongLamViec() {
            $this -> view -> getPagePhongLamViec();
        }

        public function getPagePhongNgu() {
            $this -> view -> getPagePhongNgu();
        }

        // Login/Register
        public function getPageLogin() {
            $this -> view -> getPageLogin();
        }

        public function getPageRegister() {
            $this -> view -> getPageRegister();
        }

        public function getPageForgot() {
            $this -> view -> getPageForgot();
        }

        // Admin
        public function getPageAdmin() {
            $this -> view -> getPageAdmin();
        }

        public function getPageProduct() {
            $this -> view -> getPageProduct();
        }

        public function getPagePersonnel() {
            $this -> view -> getPagePersonnel();
        }

        public function getPageDesigner() {
            $this -> view -> getPageDesigner();
        }

        // User
        public function getPageUser() {
            $this -> view -> getPageUser();
        }

        public function getPageUserPK() {
            $this -> view -> getPageUserPK();
        }
        
        public function getPageUserPLV() {
            $this -> view -> getPageUserPLV();
        }

        public function getPageUserPN() {
            $this -> view -> getPageUserPN();
        }

        // Đăng nhập
        public function doLogin() {
            $result = $this -> model -> doLogin();
            isset($result['name']) ? $_SESSION['name'] = $result['name'] : $result['name'] = null; 
            isset($result['email']) ? $_SESSION['email'] = $result['email'] : $result['email'] = null; 
            isset($result['pass']) ? $_SESSION['pass'] = $result['pass'] : $result['pass'] = null; 
            isset($result['level']) ? $_SESSION['level'] = $result['level'] : $result['level'] = null; 

            if ($result['level'] == 1) {
                $_SESSION['task'] = "pageadmin";
                echo '<script>alert("Chào '.$result['name'].' đến với DHOME/Admin")</script>';
            }
            elseif ($result['level'] == 2) {
                $_SESSION['task'] = "pageuser";
                echo '<script>alert("Chào '.$result['name'].' đến với DHOME")</script>';
            }
            else {
                $_SESSION['task'] = "pagelogin";
                echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu. Vui lòng nhập lại!")</script>';
            }
            require_once "index.php";
        }

        // Đăng ký
        public function doRegister() {
            if ($_POST['pass'] != $_POST['repass']) {
                echo '<script>alert("Mật khẩu không trùng khớp! Vui lòng nhập lại!")</script>';
                $_SESSION['task'] = 'pageregister';
            }
            elseif ($this -> model -> addUser($_POST)) { 
                echo '<script>alert("Đăng ký thành công")</script>';
                $_SESSION['task'] = 'pagelogin';
            }
        }

        // Quên mật khẩu
        public function doForgotPass() {
            if ($_POST['pass'] != $_POST['repass']) {
                echo '<script>alert("Mật khẩu không trùng khớp! Vui lòng nhập lại!")</script>';
            }
            else {
                if ($this -> model -> forgotpass($_POST)) {
                    echo '<script>alert("Đổi mật khẩu thành công")</script>';
                }
                else {
                    echo '<script>alert("Đổi mật khẩu thất bại")</script>';
                }
            }
        }

        // Thêm nhân viên
        public function doAddPersonnel() {
            $kt = true;
            if ($kt) {
                if ($this -> model -> addNV($_POST)) {
                    echo "<script>alert('Thêm nhân viên thành công')</script>";
                }
                else {
                    echo "<script>alert('Thêm nhân viên không thành công')</script>";
                }
            }
            else {
                echo "<script>alert('Nhân viên đã tồn tại! Vui lòng nhập lại!')</script>";
            }
        }

        // Xóa nhân viên
        public function doDeletePersonnel() {
            $this -> model -> deleteNV();
            $this -> getPagePersonnel();
        }

        // Sửa nhân viên
        public function doUpdatePersonnel() {
            $result = $this -> model -> getNV();
            $kt = false;

            while ($row = mysqli_fetch_array($result)) {
                if ($_POST['manv'] == $row['manv']) {
                    $kt = true;
                }
            }
            if ($kt) {
                if ($this -> model -> updateNV($_POST)) {
                    echo "<script>alert('Sửa thành công!')</script>";
                }
                else {
                    echo "<script>alert('Sửa thất bại. Vui lòng thử lại sau!')</script>";                   
                }
            }
            else {
                echo "<script>alert('Dữ liệu không có trong danh sách')</script>";
            }
        }

        // Thêm nhà thiết kế
        public function doAddDesigner() {
            if ($this -> model -> addNTK($_POST)) {
                echo "<script>alert('Thêm nhà thiết kế thành công')</script>";
            }
            else {
                echo "<script>alert('Thêm nhà thiết kế không thành công')</script>";
            }
        }

        // Xóa nhà thiết kế
        public function doDeleteDesigner() {
            $this -> model -> deleteNTK();
            $this -> getPageDesigner();
        }

        // Sửa nhà thiết kế
        public function doUpdateDesigner() {
            $result = $this -> model -> getNTK();
            $kt = false;

            while ($row = mysqli_fetch_array($result)) {
                if ($_POST['mantk'] == $row['mantk']) {
                    $kt = true;
                }
            }
            if ($kt) {
                if ($this -> model -> updateNTK($_POST)) {
                    echo "<script>alert('Sửa thành công!')</script>";
                }
                else {
                    echo "<script>alert('Sửa thất bại. Vui lòng thử lại sau!')</script>";                   
                }
            }
            else {
                echo "<script>alert('Dữ liệu không có trong danh sách')</script>";
            }
        }

        // Thêm sản phẩm
        public function doAddProduct() {
            $imgname =  $_FILES['anhsp']["name"]; 
            
            $result = $this -> model -> getAllSp();
            $kt = false;

            while ($row = mysqli_fetch_array($result)) {
                if ($_POST['masp'] == $row['masp']) {
                    $kt = true;
                }
            }
            
            if ($kt) {
                echo "<script>alert('Mã đã có! Vui lòng nhập lại!')</script>";
            }
            else {
                if ($this -> model -> addSP($_POST, $imgname)) {
                    echo "<script>alert('Thêm sản phẩm thành công')</script>"; 
                }
                else {
                    echo "<script>alert('Thêm sản phẩm không thành công')</script>"; 
                }
            }
        }

        // Xóa sản phẩm
        public function doDeleteProduct() {
            $this -> model -> deleteSP();
        }

        // Sửa sản phẩm
        public function doUpdateProduct() {
            $anh = isset($_FILES['anhsp']['name']) ? $_FILES['anhsp']['name'] : null;
            $result = $this -> model -> getAllSp();

            while ($row = mysqli_fetch_array($result)) {
                if ($_POST['masp'] == $row['masp']) {
                    $kt = true;
                }
            }

            if ($kt) {
                if ($this -> model -> updateSP($_POST, $anh)) {
                    echo "<script>alert('Sửa thành công!')</script>";
                }
                else {
                    echo "<script>alert('Sửa thất bại. Vui lòng thử lại sau!')</script>";                   
                }
            }
            else {
                echo "<script>alert('Dữ liệu không có trong danh sách')</script>";
            }
        }

        // Lấy dữ liệu tất cả sản phẩm
        public function getAllSp() {
            return $this -> model -> getAllSp();
        }

        public function getSp($temp) {
            return $this -> model -> getSP($temp);
        }

        public function getNV() {
            return $this -> model -> getNV();
        }

        public function getNTK() {
            return $this -> model -> getNTK();
        }

        public function searchPersonnel() {
            return $this -> model -> searchNV();
        }

        public function searchDesigner() {
            return $this -> model -> searchNTK();
        }

        public function searchProduct() {
            return $this -> model -> searchSP();
        }

        public function searchProductUser() {
            return $this -> model -> searchProductUser();
        }
    }
?>