<?php
    class View {
        // Home
        public function getPageHome() {
            include_once 'Templates/home.php';
        }

        public function getPagePhongKhach() {
            include_once 'Templates/phongkhach.html';
        }

        public function getPagePhongLamViec() {
            include_once 'Templates/phonglamviec.html';
        }

        public function getPagePhongNgu() {
            include_once 'Templates/phongngu.html';
        }

        // Login/Register
        public function getPageLogin() {
            include_once 'Templates/login.html';
        }

        public function getPageRegister() {
            include_once 'Templates/register.html';
        }

        public function getPageForgot() {
            include_once 'Templates/forgot-pass.html';
        }

        // Admin
        public function getPageAdmin() {
            include_once 'Templates/admin.php';
        }

        public function getPageProduct() {
            include_once 'Templates/ql_sanpham.php';
        }

        public function getPagePersonnel() {
            include_once 'Templates/ql_nhanvien.php';
        }

        public function getPageDesigner() {
            include_once 'Templates/ql_nhathietke.php';
        }

        // User 
        public function getPageUser() {
            include_once 'Templates/user.php';
        }

        public function getPageUserPK() {
            include_once 'Templates/user_phongkhach.php';
        }

        public function getPageUserPLV() {
            include_once 'Templates/user_phonglamviec.php';
        }

        public function getPageUserPN() {
            include_once 'Templates/user_phongngu.php';
        }
    }
?>