<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/base.css?= <?php echo time(); ?>">
        <link rel="stylesheet" href="./assets/css/admin.css?= <?php echo time(); ?>">
        <link rel="stylesheet" href="./assets/css/reponsive.css?= <?php echo time(); ?>">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./assets/fonts/themify-icons-font/themify-icons/themify-icons.css">
        <link rel="shortcut icon" href="https://symbols.vn/wp-content/uploads/2021/11/Mau-bieu-tuong-ngoi-nha-Png.jpg" type="image/x-icon">
        <title>DHOME - Admin</title>
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

                <div class="user-box">
                    <div class="line"></div>

                    <div class="user-icon-box">
                        <a class="user-icon">
                            <i class="ti-user"></i>
                        </a>
                        <ul class="login-sign">
                            <li><a href="index.php?task=pagehome">
                                <form action="" method="POST">
                                    <input class="user-logout" type="button" name="logout" value="Đăng xuất">
                                </form>
                            </a></li>
                        </ul>
                    </div>
                    
                    <div class="line"></div>
                </div>
            </div>

            <div class="slider">
                <div class="text-content">
                    <h2 class="text-heading">DHOME/ADMIN</h2>
                    <div class="text-description">TRANG ADMIN THIẾT KẾ NỘI THẤT</div>
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
    </body>
</html>