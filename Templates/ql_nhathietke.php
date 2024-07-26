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
        <title>DHOME - Admin/Đội Ngũ Thiết Kế</title>
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

                <form action="index.php?task=pagedesigner" method="POST" class="form-box">
                    <div class="btn-box"> 
                        <button name="sntk" class="search-btn"><i class="ti-search"></i></button>
                    </div>
                    
                    <div class="input-box">
                        <input type="search" name="searchntk" class="input-search-box" placeholder="Tìm kiếm">
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
                <h3 class="content-text">Quản lý nhà thiết kế</h3>
                <div class="add-box">
                    <a class="add-user js-add">Thêm Nhà Thiết Kế</a>
                </div>
                <div class="content-section">
                    <div class="content-right">
                        <table class="content-table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Mã Nhà Thiết Kế</th>
                                <th>Tên Nhà Thiết Kế</th>
                                <th>Gmail</th>
                                <th>Số Điện Thoại</th>
                                <th>Quê Quán</th>
                                <th>Tùy Chỉnh</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $controller = new controller();
                                     isset($_POST['sntk']) ? $result = $controller -> searchDesigner():$result = $controller -> getNTK();
                                    $id = 1;
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <th><?php echo $id ++ ?></th>
                                            <td><?php echo $row['mantk'] ?></td>
                                            <td><?php echo $row['tenntk'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td>
                                                <a class="td-setting js-fix">Sửa</a>
                                                <a class="td-setting js-delete"
                                                    href="index.php?task=pagedesigner&mantk=<?php echo $row['mantk'] ?>">Xoá</a>
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
                        <a href="" class="footer-icon-link"><i class="footer-icon ti-facebook"></i></a>
                        <a href="" class="footer-icon-link"><i class="footer-icon ti-twitter-alt"></i></a>
                        <a href="" class="footer-icon-link"><i class="footer-icon ti-instagram"></i></a>
                    </div>
                    <p class="content-text">@ 2012 bản quyền của Decor. Decor - <a href="">Thiết kế nội thất</a></p>
                </div>
            </div>
        </div>

        <div class="modal js-modal">
            <div class="modal-container js-modal-container">
                <div class="modal-close js-modal-close">
                    <i class="ti-close"></i>
                </div>

                <div class="model-header">
                    <h3 class="header-text">Thêm Nhà Thiết Kế</h3>
                </div>

                <div class="modal-body">
                    <form action="" method="POST">
                        <label for="" class="modal-label">
                            Mã Nhà Thiết Kế
                        </label>
                        <input name="mantk" type="text" class="modal-input" placeholder="Điền Mã Nhà Thiết Kế" required="">

                        <label for="" class="modal-label">
                            Tên Nhà Thiết Kế
                        </label>
                        <input name="tenntk" type="text" class="modal-input" placeholder="Điền Tên Nhà Thiết Kế" required="">

                        <label for="" class="modal-label">
                            Gmail
                        </label>
                        <input name="email" type="text" class="modal-input" placeholder="Điền Gmail" required="">

                        <label for="" class="modal-label">
                            Số Điện Thoại
                        </label>
                        <input name="phone" type="text" class="modal-input" placeholder="Điền Số Điện Thoại" required="">

                        <label for="" class="modal-label">
                            Quê Quán
                        </label>
                        <input name="address" type="text" class="modal-input" placeholder="Điền Quê Quán" required="">

                        <input name="addntk" type="submit" class="modal-add" value="Thêm Nhà Thiết Kế">
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
                    <h3 class="header-text">Sửa Nhà Thiết Kế</h3>
                </div>
    
                <div class="modal-body">
                    <div class="box-fix">
                        <form action="" method="POST">
                            <label for="" class="modal-label">
                                Mã Nhà Thiết Kế
                            </label>
                            <input name="mantk" type="text" class="modal-input" placeholder="Sửa Mã Nhà Thiết Kế" required="">
    
                            <label for="" class="modal-label">
                                Tên Nhà Thiết Kế
                            </label>
                            <input name="tenntk" type="text" class="modal-input" placeholder="Sửa Tên Nhà Thiết Kế" required="">
    
                            <label for="" class="modal-label">
                                Gmail
                            </label>
                            <input name="email" type="text" class="modal-input" placeholder="Sửa Gmail" required="">
    
                            <label for="" class="modal-label">
                                Số Điện Thoại
                            </label>
                            <input name="phone" type="text" class="modal-input" placeholder="Sửa Số Điện Thoại" required="">
    
                            <label for="" class="modal-label">
                                Quê Quán
                            </label>
                            <input name="address" type="text" class="modal-input" placeholder="Sửa Quê Quán" required="">
    
                            <input name="updatentk" type="submit" class="fix-input" value="Sửa Nhà Thiết Kế">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const buyBtn = document.querySelector('.js-add');
            const modal = document.querySelector('.js-modal')
            const modalContainer = document.querySelector('.js-modal-container');
            const modalClose = document.querySelector('.js-modal-close');
            
            function showBuyTickets() {
                modal.classList.add('open')
            }

            function hideBuyTickets() {
                modal.classList.remove('open')
            }

            buyBtn.addEventListener('click', showBuyTickets)

            modalClose.addEventListener('click', hideBuyTickets)

            modal.addEventListener('click', hideBuyTickets)

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