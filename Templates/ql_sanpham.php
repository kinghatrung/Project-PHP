<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./assets/fonts/themify-icons-font/themify-icons/themify-icons.css">
        <link rel="shortcut icon" href="https://symbols.vn/wp-content/uploads/2021/11/Mau-bieu-tuong-ngoi-nha-Png.jpg" type="image/x-icon">
        <link rel="stylesheet" href="./assets/css/admin.css?= <?php echo time(); ?>">
        <title>DHOME - Admin/Sản Phẩm</title>
    </head>

    <body>
        <div class="main">
            <div class="header">
                <div class="nav-logo">
                    <h1><a href="index.php?task=pageadmin" class="nav-logo__text">DHOME/Admin</a></h1>
                </div>

                <ul class="nav">
                    <li><a href="index.php?task=pageproduct">Sản phẩm</a></li>
                    <li><a href="index.php?task=pagepersonnel">Nhân viên</a></li>
                    <li><a href="index.php?task=pagedesigner">Đội ngũ kiến trúc sư</a></li>
                </ul>

                <form action="" method="POST" class="form-box">
                    <div class="btn-box"> 
                        <button name="ssp" class="search-btn"><i class="ti-search"></i></button>
                    </div>
                    
                    <div class="input-box">
                        <input type="search" name="searchsp" class="input-search-box" placeholder="Tìm kiếm">
                    </div>
                </form>

                <div class="user-box">
                    <div class="line"></div>
                    <div class="user-icon-box">
                        <a class="user-icon"><i class="ti-user"></i></a>
                        <ul class="login-sign">
                            <li><a href="index.php?task=pagehome">
                                <form action="" method="post">
                                    <input class="user-logout" type="button" name="logout" value="Đăng xuất">
                                </form>
                            </a></li>
                        </ul>
                    </div>
                    <div class="line"></div>
                </div>
            </div>

            <div class="content">
                <h3 class="content-text">Trang Quản Lý Sản Phẩm</h3>
                <div class="content-section">
                    <div class="content-left">
                        <h3 class="content-category">Danh Mục</h3>
                        <ul class="content-list">
                            <li><a href="index.php?task=pageproduct&sp=all">Tất Cả</a></li>
                            <li><a href="index.php?task=pageproduct&sp=pk">Phòng Khách</a></li>
                            <li><a href="index.php?task=pageproduct&sp=plv">Phòng Làm Việc</a></li>
                            <li><a href="index.php?task=pageproduct&sp=pn">Phòng Ngủ</a></li>
                        </ul>
                        <a class="content-add js-add">Thêm sản phẩm</a>
                    </div>

                    <div class="straight-line"></div>

                    <div class="content-right">
                        <table class="content-table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Mã Mẫu Decor</th>
                                <th>Mẫu Decor</th>
                                <th>Giá</th>
                                <th>Tùy Chỉnh</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $controller = new controller();
                                    $sp = isset($_GET['sp']) ? $_GET['sp'] : 'all';
                                    if ($sp == 'all') {
                                        $result = $controller -> getAllSp();
                                    }
                                    else {
                                        $result = $controller -> getSp($sp);
                                    }
                                    
                                    if(isset($_POST['ssp'])) {
                                        $result = $controller -> searchProduct();
                                    }

                                    $id = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if (preg_match('/Pk/', $row['masp'])) {
                                            if($masp = 'phongkhach') {
                                                if(isset($_POST['addsp'])) {
                                                    $path = "assets/img/decor/$masp/";
                                                    if (isset($_FILES['anhsp']['name'])) {
                                                        $imgname = $_FILES['anhsp']["name"];
                                                        move_uploaded_file($_FILES['anhsp']['tmp_name'], $path . $imgname);  
                                                    }
                                                }
                                            }
                                        }
                                        elseif (preg_match('/Plv/', $row['masp'])) {
                                            if($masp = 'phonglamviec') {
                                                if(isset($_POST['addsp'])) {
                                                    $path = "assets/img/decor/$masp/";
                                                    if (isset($_FILES['anhsp']['name'])) {
                                                        $imgname = $_FILES['anhsp']["name"];
                                                        move_uploaded_file($_FILES['anhsp']["tmp_name"], $path . $imgname);  
                                                    }
                                                }
                                            }
                                        }
                                        elseif (preg_match('/Pn/', $row['masp'])) {
                                            if($masp = 'phongngu') {
                                                if(isset($_POST['addsp'])) {
                                                    $path = "assets/img/decor/$masp/";
                                                    if (isset($_FILES['anhsp']['name'])) {
                                                        $imgname = $_FILES['anhsp']["name"];
                                                        move_uploaded_file($_FILES['anhsp']["tmp_name"], $path . $imgname);  
                                                    }
                                                }
                                            }
                                        }
                                        else {
                                            $masp = null;
                                        }
                                        ?>
                                        <tr>
                                            <th><?php echo $id ++ ?></th>
                                            <td><?php echo $row['masp']; ?></td>
                                            <td>
                                                <div class="td-box">
                                                    <?php echo '<img class="td-img" src="./assets/img/decor/'.$masp.'/'.$row['img'].'" alt="Ảnh Sản Phẩm">'; ?>
                                                </div>
                                            </td>
                                            <td><?php echo $row['giasp'] . ' vnđ'; ?></td>
                                            <td>
                                                <a class="td-setting js-fix">Sửa</a>
                                                <a class="td-setting js-delete"
                                                href="index.php?task=pageproduct&masp=<?php echo $row['masp'] ?>">Xoá</a>
                                            </td>
                                        </tr>      
                                    <?php } 
                                ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="footer-content">
                    <p class="content-text">Chính sách quyền riêng tư</p>
                    <div class="content-icons">
                        <a href="https://www.facebook.com/huyen2706" class="footer-icon-link"><i class="footer-icon ti-facebook"></i></a>
                        <a href="https://github.com/kinghatrung" class="footer-icon-link"><i class="footer-icon ti-github"></i></a>
                        <a href="https://www.instagram.com/huyen_27.63/" class="footer-icon-link"><i class="footer-icon ti-instagram"></i></a>
                    </div>
                    <p class="content-text">@ 2012 bản quyền của Decor. Decor - <a href="index.php?task=pageadmin">Thiết kế nội thất</a></p>
                </div>
            </div>
        </div>

        <div class="modal js-modal">
            <div class="modal-container js-modal-container">
                <div class="modal-close js-modal-close">
                    <i class="ti-close"></i>
                </div>

                <div class="model-header">
                    <h3 class="header-text">Thêm Sản Phẩm</h3>
                </div>

                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="" class="modal-label">
                            Mã mẫu Decor
                        </label>
                        <input name="masp" type="text" class="modal-input" placeholder="Điền Mã Mẫu Decor" required="">

                        <label for="" class="modal-label">
                            Chọn ảnh
                        </label>
                        <input name="anhsp" type="file" class="modal-file">

                        <label for="" class="modal-label">
                            Giá mẫu
                        </label>
                        <input name="giasp" type="text" class="modal-input" placeholder="Điền Giá Mẫu Decor" required="">

                        <input name="addsp" type="submit" class="modal-add" value="Thêm mẫu">
                    </form>
                </div>
            </div>
        </div>

        <!-- <div class="modal-delete js-modal-delete">
            <div class="modal-container js-modal-container-delete">
                <div class="modal-close js-modal-close-delete">
                    <i class="ti-close"></i>
                </div>
    
                <div class="modal-header">
                    <h3 class="header-text">Xoá là mất nha!...Xoá hẳn chưa để biết đường nào ?</h3>
                </div>
    
                <div class="modal-body">
                    <div class="box-delete">
                        <form action="" method="">
                            <input name="delete" class="btn-delete" type="submit" value="Có">
                            <input name="delete" class="btn-delete" type="submit" value="Không">
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="modal-fix js-modal-fix">
            <div class="modal-container js-modal-container-fix">
                <div class="modal-close js-modal-close-fix">
                    <i class="ti-close"></i>
                </div>
    
                <div class="modal-header">
                    <h3 class="header-text">Sửa Sản Phẩm</h3>
                </div>
    
                <div class="modal-body">
                    <div class="box-fix">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="" class="modal-label">
                                Mã mẫu Decor
                            </label>
                            <input type="text" name="masp" class="modal-input" placeholder="Điền Mã Mẫu Sửa" required="">
    
                            <label for="" class="modal-label" >
                                Chọn ảnh
                            </label>
                            <input type="file" class="modal-file" name="anhsp">

                            <label for="" class="modal-label">
                                Giá mẫu
                            </label>
                            <input type="text" name="giasp" class="modal-input" placeholder="Điền Giá Mẫu Sửa" required="">

                            <input name="updatesp" type="submit" class="fix-input" value="Sửa mẫu">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const addBtn = document.querySelector('.js-add')
            const modal = document.querySelector('.js-modal')
            const modalClose = document.querySelector('.js-modal-close')
            const modalContainer = document.querySelector('.js-modal-container')
            
            function showFormAdd() {
                modal.classList.add('open')
            }

            function hideFormAdd() {
                modal.classList.remove('open')
            }

            addBtn.addEventListener('click', showFormAdd)

            modalClose.addEventListener('click', hideFormAdd)

            modal.addEventListener('click', hideFormAdd)

            modalContainer.addEventListener('click', function (event) {
                event.stopPropagation();
            })
        </script>

        <!-- <script>
            const btnDelete = document.querySelectorAll('.js-delete')
            const modalDelete = document.querySelector('.js-modal-delete')
            const modalCloseDelete = document.querySelector('.js-modal-close-delete')
            const modalContainerDelete = document.querySelector('.js-modal-container-delete')
            
            function showFormDelete() {
                modalDelete.classList.add('open')
            }

            function hideFormDelete() {
                modalDelete.classList.remove('open')
            }

            for (const btnDeletes of btnDelete) {
                btnDeletes.addEventListener('click', showFormDelete)
            }

            modalCloseDelete.addEventListener('click', hideFormDelete)

            modalDelete.addEventListener('click', hideFormDelete)

            modalContainerDelete.addEventListener('click', function (event) {
                event.stopPropagation();
            })
        </script> -->

        <script>
            const btnFix = document.querySelectorAll('.js-fix')
            const modalFix = document.querySelector('.js-modal-fix')
            const modalCloseFix = document.querySelector('.js-modal-close-fix')
            const modalContainerFix = document.querySelector('.js-modal-container-fix')
            
            function showFormFix() {
                modalFix.classList.add('open')
            }

            function hideFormFix() {
                modalFix.classList.remove('open')
            }

            for (const btnFixs of btnFix) {
                btnFixs.addEventListener('click', showFormFix)
            }

            modalCloseFix.addEventListener('click', hideFormFix)

            modalFix.addEventListener('click', hideFormFix)

            modalContainerFix.addEventListener('click', function (event) {
                event.stopPropagation();
            })
        </script>
    </body>
</html>

