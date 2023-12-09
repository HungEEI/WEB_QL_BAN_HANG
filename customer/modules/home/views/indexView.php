<?php
get_header();
?>

<?php
$cat_name_mobile = get_category_name_by_id(3);
$cat_name_laptop = get_category_name_by_id(18);
$cat_name_earphone = get_category_name_by_id(19);
$cat_name_screen = get_category_name_by_id(31);
$info_sliders = get_info_sliders();
?>

<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php 
                    foreach($info_sliders as $item) {
                        ?>
                        <div class="item">
                            <a href=""><img src="../admin/<?php echo $item['image_url'] ?>" alt=""></a>
                        </div>
                        <?php
                    }
                    ?>                 
                </div>
            </div>
        </div>
        <?php
        get_sidebar();
        ?>      
        <div class="section container" id="support-wp">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <div class="thumb">
                            <img src="public/images/icon-1.png">
                        </div>
                        <h3 class="title">Miễn phí vận chuyển</h3>
                        <p class="desc">Tới tận tay khách hàng</p>
                    </li>
                    <li>
                        <div class="thumb">
                            <img src="public/images/icon-2.png">
                        </div>
                        <h3 class="title">Tư vấn 24/7</h3>
                        <p class="desc">1900.9999</p>
                    </li>
                    <li>
                        <div class="thumb">
                            <img src="public/images/icon-3.png">
                        </div>
                        <h3 class="title">Tiết kiệm hơn</h3>
                        <p class="desc">Với nhiều ưu đãi cực lớn</p>
                    </li>
                    <li>
                        <div class="thumb">
                            <img src="public/images/icon-4.png">
                        </div>
                        <h3 class="title">Thanh toán nhanh</h3>
                        <p class="desc">Hỗ trợ nhiều hình thức</p>
                    </li>
                     <li>
                         <div class="thumb">
                            <img src="public/images/icon-5.png">
                        </div>
                        <h3 class="title">Đặt hàng online</h3>
                        <p class="desc">Thao tác đơn giản</p>
                    </li>
                </ul>
            </div>
        </div>
        <section class="section_flash_sale">
            <div class="container">
                <div class="clearfix titlecate">
                   <div class="titlecate-left">
                        <h2>
                            <a href="san-pham-noi-bat" title="Flash sale">
                                    <img class="lazyload set" src="https://bizweb.dktcdn.net/100/397/652/themes/894828/assets/i_flash_sale.png?1676272391216" data-src="//bizweb.dktcdn.net/100/397/652/themes/894828/assets/i_flash_sale.png?1676272391216" alt="Eco Shop" width="24" height="33"> Flash sale
                                </a>
                        </h2>          
                        <div class="wrap_time">
                            <div class="time" data-countdown="countdown" data-date="12-12-2022-09-15-45">
                                <div class="lof-labelexpired">
                                <span class="block-timer" id="hours">00</span>
                                <span class="block-timer" id="minutes">00</span>
                                <span class="block-timer" id="seconds">00</span>
                                </div>
                            </div>
                        </div>
                   </div>
                    <a class="xemall" href="#" title="Xem tất cả">
                        Xem tất cả 
                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-right fa-w-8"><path fill="currentColor" d="M24.707 38.101L4.908 57.899c-4.686 4.686-4.686 12.284 0 16.971L185.607 256 4.908 437.13c-4.686 4.686-4.686 12.284 0 16.971L24.707 473.9c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L41.678 38.101c-4.687-4.687-12.285-4.687-16.971 0z" class=""></path></svg>
                    </a>
                </div>
                <div class="clearfix block-product">        
                    <div class="section" id="feature-product-wp">                      
                        <div class="section-detail">
                            <ul class="list-item">    
                                <?php 
                                $list_product = get_info_list_product();
                                foreach($list_product as $product) {
                                    if($product['is_featured'] == 1) {
                                        ?>
                                        <li>
                                            <a href="<?php echo $product['url'] ?>" title="" class="thumb">
                                                <img src="../admin/<?php echo $product['thumb'][0] ?>">
                                            </a>
                                            <a href="?page=detail_product" title="" class="product-name name-18"><?php echo $product['product_name'] ?></a>
                                            <div class="price">
                                                <span class="new"><?php echo currency_format($product['product_price']) ?></span>
                                                <span class="old"><?php echo currency_format($product['product_discount']) ?></span>
                                            </div>
                                            <div class="action clearfix">
                                                <!-- <a href="?mod=cart&controller=index&action=add&id=<?php echo $product['product_id'] ?>" title="" class="add-cart fl-left mg-l">Thêm giỏ hàng</a> -->
                                                <a href="<?php echo $product['url_checkout'] ?>" title="" class="buy-now buy-now-2 product-sale">Mua ngay</a>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>                                                     
                            </ul>
                        </div>
                    </div>
                </div>
        </section>
        <!-- BANNER -->
        <div class="container">
            <a class="scale_hover" href="#" title="Banner">
                <img class="banner-pc" src="public/images/banner-3.png" alt="">    
            </a>
        </div>
        <!-- ĐIỆN THOẠI -->
        <div class="container">
            <div class="section container" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">
                        <a href="" class="a-cat">
                            <?php echo $cat_name_mobile['category_name'] ?>
                        </a>
                    </h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix"> 
                        <?php
                        foreach(get_all_products_by_category(3) as $product) {
                            if($product['status'] == 'active') {
                                ?>
                                <li>
                                    <a href="?page=detail_product" title="" class="thumb thumb-70">
                                        <img src="../admin/<?php echo $product['thumb'][0] ?>">
                                    </a>
                                    <a href="?page=detail_product" title="" class="product-name"><?php echo $product['product_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($product['product_price']) ?></span>
                                        <span class="old"><?php echo currency_format($product['product_discount']) ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="<?php echo $product['url_cart'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="<?php echo $product['url_checkout'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>                       
                                <?php
                            }
                        }
                        ?>                          
                    </ul>
                </div>
            </div>
        </div>
        <!-- BANNER LAPTOP -->
        <div class="container">
            <a class="scale_hover" href="#" title="Banner">
                <img class="banner-pc" src="public/images/banner-1.png" alt="">    
            </a>
        </div>
        <div class="section container" id="list-product-wp">
            <div class="section-head">
                <h3 class="section-title h3-cat">
                    <a href="" class="a-cat">
                        <?php echo $cat_name_laptop['category_name'] ?>
                    </a>
                </h3>
            </div>
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <?php
                        foreach(get_all_products_by_category(18) as $product) {
                            if($product['status'] == 'active') {

                                ?>
                                <li>
                                    <a href="?page=detail_product" title="" class="thumb">
                                        <img src="../admin/<?php echo $product['thumb'][0] ?>">
                                    </a>
                                    <a href="?page=detail_product" title="" class="product-name"><?php echo $product['product_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($product['product_price']) ?></span>
                                        <span class="old"><?php echo currency_format($product['product_discount']) ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=order&controller=index&action=index" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="<?php echo $product['url_checkout'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>                       
                                <?php
                            }
                        }
                    ?>       
                </ul>
            </div>
        </div>
        <!-- BANNER TAI NGHE-->
        <div class="container">
            <a class="scale_hover" href="#" title="Banner">
                <img class="banner-pc" src="public/images/banner-2.png" alt="">    
            </a>
        </div>
        <div class="section container" id="list-product-wp">
            <div class="section-head">
                <h3 class="section-title h3-cat">
                    <a href="" class="a-cat">
                        <?php echo $cat_name_earphone['category_name'] ?>
                    </a>
                </h3>
            </div>
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <?php
                    foreach(get_all_products_by_category(19) as $product) {
                        if($product['status'] == 'active') {
                            ?>
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="../admin/<?php echo $product['thumb'][0] ?>">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name"><?php echo $product['product_name'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($product['product_price']) ?></span>
                                    <span class="old"><?php echo currency_format($product['product_discount']) ?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="<?php echo $product['url_cart'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="<?php echo $product['url_checkout'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>                       
                            <?php
                        }
                    }
                    ?>                   
                </ul>
            </div>
        </div>
        <!-- BANNER MÀN HÌNH -->
        <div class="container">
            <a class="scale_hover" href="#" title="Banner">
                <img class="banner-pc" src="public/images/banner-4.png" alt="">    
            </a>
        </div>
        <div class="section  container" id="list-product-wp">
            <div class="section-head">
                <h3 class="section-title h3-cat">
                    <a href="" class="a-cat">
                        <?php echo $cat_name_screen['category_name'] ?>
                    </a>
                </h3>
            </div>
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <?php
                    foreach(get_all_products_by_category(31) as $product) {
                        if($product['status'] == 'active') {
                            ?>
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="../admin/<?php echo $product['thumb'][0] ?>">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name"><?php echo $product['product_name'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($product['product_price']) ?></span>
                                    <span class="old"><?php echo currency_format($product['product_discount']) ?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="<?php echo $product['url_cart'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="<?php echo $product['url_checkout'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>                       
                            <?php
                        }
                    }
                    ?>                   
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
<script>
    function updateCountdown() {
        var countDownDate = new Date();
        countDownDate.setHours(countDownDate.getHours() + 2);

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
            document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
            document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');

            if (distance < 0) {
                clearInterval(x);
                updateCountdown(); 
            }
        }, 1000);
    }
    updateCountdown();
</script>

