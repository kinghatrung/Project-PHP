<?php
    session_start();
    require_once "Controllers/controller.php";
    $controller = new controller();
    $task = isset($_GET['task']) ? $_GET['task']: null;

    // Home
    if (isset($_POST['login'])) {
        $controller -> doLogin();
    }
    
    if (isset($_POST['register'])) {
        $controller -> doRegister();
    }

    if (isset($_POST['forgot'])) {
        $controller -> doForgotPass();
    }

    // Admin
    if (isset($_POST['addnv'])) {
        $controller -> doAddPersonnel();
    }
    elseif (isset($_GET['manv'])) {
        $controller -> doDeletePersonnel();
    }
    elseif (isset($_POST['updatenv'])) {
        $controller -> doUpdatePersonnel();
    }
    elseif (isset($_POST['addntk'])) {
        $controller -> doAddDesigner();
    }
    elseif (isset($_GET['mantk'])) {
        $controller -> doDeleteDesigner();
    }
    elseif (isset($_POST['updatentk'])) {
        $controller -> doUpdateDesigner();
    }
    elseif (isset($_POST['addsp'])) {
        $controller -> doAddProduct();
    }
    elseif (isset($_GET['masp'])) {
        $controller -> doDeleteProduct();
    }
    elseif (isset($_POST['updatesp'])) {
        $controller -> doUpdateProduct();
    }

    isset($_SESSION['task']) ? $task = $_SESSION['task'] : null; 
    if(isset($_SESSION['task']))unset($_SESSION['task']);

    switch ($task) {
        // Home
        case 'pagehome':
            $controller -> getPageHome();
            break;

        case 'pagepk':
            $controller -> getPagePhongKhach();
            break;

        case 'pageplv':
            $controller -> getPagePhongLamViec();
            break;

        case 'pagepn':
            $controller -> getPagePhongNgu();
            break;    

        // Login/register
        case 'pagelogin':
            $controller -> getPageLogin();
            break;    

        case 'pageregister':
            $controller -> getPageRegister();
            break;
            
        case 'pageforgot':
            $controller -> getPageForgot();
            break;   

        // Admin
        case 'pageadmin':
            $controller -> getPageAdmin();
            break;
            
        case 'pageproduct':
            $controller -> getPageProduct();
            break;

        case 'pagepersonnel':
            $controller -> getPagePersonnel();
            break;

        case 'pagedesigner':
            $controller -> getPageDesigner();
            break;

        // User
        case 'pageuser':
            $controller -> getPageUser();
            break;

        case 'pageuserpk':
            $controller -> getPageUserPK();
            break;

        case 'pageuserplv':
            $controller -> getPageUserPLV();
            break;

        case 'pageuserpn':
            $controller -> getPageUserPN();
            break;

        default:
            $controller -> getPageHome();
            break;
    }
?>