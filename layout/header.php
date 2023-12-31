<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo base_url() ?>">
        <link rel="icon" href="public/images/icon-logo.png" type="image/x-icon">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/app.js"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="trang-chu.html" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="san-pham/tat-ca-san-pham.html" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="tin-tuc/cong-nghe.html" title="">Tin tức</a>
                                    </li>
                                    <li>
                                        <a href="trang/gioi-thieu-02.html" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="trang/lien-he-06.html" title="">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner wp-flex">
                            <div class="header-right">
                                <a href="trang-chu.html" title="" id="logo"><img class="" src="public/images/logo.png"/></a>
                                <div id="search-wp">
                                    <form method="GET" action="?mod=products&controller=index&action=searchmain">
                                        <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">                               
                                        <button type="submit" name="btn-smain" id="sm-s">Tìm kiếm</button>
                                        <input type="hidden" name="mod" value="products">
                                        <input type="hidden" name="controller" value="index">
                                        <input type="hidden" name="action" value="searchmain">
                                    </form>
                                </div>                              
                                <div style="display: none;" class="list-search" id="searchResults">
                                    <ul>
                                        <?php
                                        foreach(get_search_5() as $p) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $p['url'] ?>"><img style="width: 60px;" src="admin/<?php echo $p['thumb'][0]?>" alt=""></a>
                                                <a href=""><?php echo $p['product_name'] ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="header-left">
                                <div id="action-wp" class="fl-right">
                                    <div id="advisory-wp" class="fl-left">
                                        <span class="title">Tư vấn</span>
                                        <span class="phone">0987.654.321</span>
                                    </div>
                                    <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                    <a href="gio-hang/danh-sach.html" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php echo get_num_oder_cart() ?></span>
                                    </a>
                                    <div id="cart-wp" class="fl-right">
                                        <div id="btn-cart">
                                            <a style="color: #fff" href="gio-hang/danh-sach.html">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            </a>
                                            <span id="num"><?php echo get_num_oder_cart() ?></span>
                                            <div id="dropdown">
                                                <p class="desc">Có <span><?php 
                                                if (get_num_oder_cart() == 0) {
                                                    echo '0';
                                                } else {
                                                    echo get_num_oder_cart();
                                                }
                                                ?> sản phẩm</span> trong giỏ hàng</p>
                                            
                                                <ul class="list-cart">
                                                    <?php                                             
                                                    foreach(get_list_by_cart() as $item) {
                                                        ?>
                                                        <li class="clearfix">
                                                            <a href="" title="" class="thumb fl-left">
                                                                <img src="admin/<?php echo $item['image_url'] ?>" alt="">
                                                            </a>
                                                            <div class="info fl-right">
                                                                <a href="" title="" class="product-name"><?php echo $item['product_name'] ?></a>
                                                                <p class="price"><?php echo currency_format($item['product_price']) ?></p>
                                                                <p class="qty">Số lượng: <span><?php echo $item['qty'] ?></span></p>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>                                        
                                                </ul>
                                                <div class="total-price clearfix">
                                                    <p class="title fl-left">Tổng:</p>
                                                    <p class="price fl-right"><?php echo currency_format(get_total_cart()) ?></p>
                                                </div>
                                                <div class="action-cart clearfix">
                                                    <a href="gio-hang/danh-sach.html" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                                    <a href="thanh-toan/don-mua.html" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <div id="login-btn">
                                                <button class="about__box-icon" id="show-login">
                                                    <span class="input-icon"><i class="fa fa-user"></i></span>
                                                </button>
                                            </div>
                                            <div class="popup">
                                                <div class="close-btn">&times;</div>
                                                <div>
                                                    <h2 style="color: red;">ISMART</h2>
                                                    <div class="text">
                                                        <p>Đăng nhập để có trải nghiệm mua sắm tốt hơn</p>
                                                    </div>
                                                    <div class="button-group">
                                                        <div class="login-btn">
                                                            <a href="chuc-nang/dang-nhap.html">Đăng nhập ngay</a>
                                                        </div>
                                                        <div class="register-btn">
                                                            <a href="chuc-nang/dang-ky.html">Đăng ký</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div id="overlay"></div>
                    <script src="public/js/login_logout.js"></script>
                                