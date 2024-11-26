<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
        <link rel="shortcut icon" href="https://symbols.vn/wp-content/uploads/2021/11/Mau-bieu-tuong-ngoi-nha-Png.jpg" type="image/x-icon">
        <link rel="stylesheet" href="./assets/css/base.css?= <?php echo time(); ?>">
        <link rel="stylesheet" href="./assets/css/main.css?= <?php echo time(); ?>">
        <link rel="stylesheet" href="./assets/css/reponsive?= <?php echo time(); ?>">        
        <title>DHOME | Mẫu Phòng Khách</title>
    </head>

    <body>
        <div class="main">
            <div class="header">
            <div class="nav-logo">
                    <h1 class="nav-logo-text"><a href="index.php?task=pageuser">DHOME</a></h1>
                </div>

                <ul class="nav">
                    <li><a href="#" hre>Trang chủ</a></li>
                    <li><a href="#intro">Giới thiệu</a></li>
                    <li>
                        <a href="#form">Các mẫu decor</a>
                        <ul class="subnav">
                            <li><a href="index.php?task=pageuserpk&sp=pk">Phòng khách</a></li>
                            <li><a href="index.php?task=pageuserplv&sp=plv">Phòng làm việc</a></li>
                            <li><a href="index.php?task=pageuserpn&sp=pn">Phòng ngủ</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Liên hệ</a></li>
                </ul>


                <!-- <form action="" method="POST" class="search-form">
                    <div class="search-btn-box">
                        <button name="ssp" class="search-btn"><i class="search-icon ti-search"></i></button>
                    </div>

                    <div class="search-input-box">
                        <input type="search" class="search-input" placeholder="Tìm kiếm">
                    </div>
                </form> -->

                <div class="search-box">
                    <div class="line"></div>

                    <div class="user-icon-box">
                        <a class="user-icon"><i class="ti-user"></i></a>
                       
                        <ul class="user-subnav">
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

            <div class="content">
                <div id="form" class="content-img">
                    <h2 class="section-heading-decor">Mẫu Decor Phòng Khách</h2>
                    <div class="decor-list">
                        <?php 
                            require_once "Controllers/controller.php";
                            $controller = new controller();
                            $sp = isset($_GET['sp']) ? $_GET['sp'] : 'pk';

                            if ($sp == 'pk') {
                                $result = $controller -> getSp($sp);
                            }
                            elseif ($sp == 'plv') {
                                $result = $controller -> getSp($sp);
                            }
                            elseif ($sp == 'pn') {
                                $result = $controller -> getSp($sp);
                            }
                            else {
                                $result = $controller -> getAllSp();
                            }

                            if(isset($_POST['ssp'])) $result = $controller -> searchProduct();
                            while($row = mysqli_fetch_array($result)) {
                                if (preg_match('/Pk/', $row['masp'])) {
                                    $ma = 'phongkhach';
                                }
                                elseif (preg_match('/Plv/', $row['masp'])) {
                                    $ma = 'phonglamviec';
                                }
                                elseif (preg_match('/Pn/', $row['masp'])) {
                                    $ma = 'phongngu';
                                }
                                else {
                                    $ma = null;
                                }
                            ?>
                            <?php
                                echo '<div class="decor-item">
                                    <div href="" class="decor-link">
                                        <img src="./assets/img/decor/'.$ma.'/'.$row['img'].'" alt="" class="decor-img">
                                    </div>
                                    <p class="decor-btn">Giá tiền: '.$row['giasp'].' VNĐ</p>
                                </div>';
                            ?>
                        <?php } ?>
                    </div>
                </div>

                <div id="contact" class="content-contact">
                    <h2 class="section-heading">Liên Hệ</h2>
                    <!-- Contact List -->
                    <div class="contact-list">
                        <div class="contact-intro">
                            <h2 class="contact-sub">Giới Thiệu</h2>
                            <p class="contact-text">
                                Bạn đang phân vân không biết nên chọn phong cách thiết kế nội thất nào cho ngôi nhà bạn?.
                                Từ năm 2012, Nhà Decor tự hào với đội ngũ thiết kế trẻ, nhiệt huyết, sáng tạo luôn học hỏi, cập nhật các xu hướng thiết kế và kỹ thuật mới nhất.
                                Thế mạnh chủ lực là tư vấn thiết kế, với phương châm thiết kế “ Không Đâu Bằng Nhà ” Nhà Decor đã tự tin khẳng định chất lượng dịch vụ, lẫn tính thẩm mĩ cao trong từng chi tiết thiết kế và thi công của mình với rất nhiều khách hàng
                            </p>
                        </div>  

                        <div class="contact-address">
                            <h2 class="contact-sub">Địa chỉ</h2>
                            <div class="address-list">
                                <p>
                                    <i class="contact-icon ti-map-alt"></i>
                                    Địa chỉ: 69/52 Nguyễn Gia Trí, P. 25, Q. Bình Thạnh, HCM.
                                </p>
                                <p>
                                    <i class="contact-icon ti-map-alt"></i>
                                    Địa chỉ: 31 Đường D4, P. Tân Hưng, Q. 7, TPHCM.
                                </p>
                                <p>
                                    <i class="contact-icon ti-map-alt"></i>
                                    Địa chỉ: 24 Nguyễn Văn Hoa, P. Thống Nhất, TP Biên Hòa.
                                </p>
                                <p>
                                    <i class="contact-icon ti-map-alt"></i>
                                    Địa chỉ: 86 Đại Lộ Bình Dương, TDM Bình Dương.
                                </p>
                            </div>
                        </div>

                        <div class="contact-email">
                            <h2 class="contact-sub">Liên Hệ</h2>
                            <div class="email-list">
                                <p><i class="contact-icon ti-headphone"></i>0911822612</p>
                                <p><i class="contact-icon ti-headphone"></i>0961753837</p>
                                <p><i class="contact-icon ti-headphone"></i>myzlucky2706@gmail.com</p>
                                <p><i class="contact-icon ti-headphone"></i>nguyenred2003@gmail.com</p>
                            </div>
                        </div>

                        <div class="contact-follow">
                            <h2 class="contact-sub">Liên hệ với chúng tôi</h2>
                            <div class="follow-list">
                                <p><i class="contact-icon ti-facebook"></i><a href="https://www.facebook.com/huyen2706">Facebook</a></p>
                                <p><i class="contact-icon ti-instagram"></i><a href="https://www.instagram.com/huyen_27.63/">Instagram</a></p>
                                <p><i class="contact-icon ti-google"></i><a href="https://www.google.com/">Google</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- End Contact List -->
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
                    <p class="content-text">@ 2012 bản quyền của Decor. Decor - <a href="index.php?task=pageuser">Thiết kế nội thất</a></p>
                </div>
            </div>

        </div>
    </body>
</html>