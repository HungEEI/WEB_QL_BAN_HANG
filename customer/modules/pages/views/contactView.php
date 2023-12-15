<?php
get_header();
?>

<?php
$list_pages = db_fetch_array("SELECT * FROM `pages`");
?>

<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title text-center">Liên hệ</h3>
                </div>
                <div class="section-detail">
                    <div class="block menu-ft d-flex" id="info-shop">
                        <div class="info">
                            <h3 class="section_title">STORE</h3>
                            <ul class="list-item">
                                <li>
                                    <p>334 Nguyễn Trãi - Thanh Xuân - Hà Nội</p>
                                </li>
                                <li>
                                    <p>0987.654.321 - 0989.989.989</p>
                                </li>
                                <li>
                                    <p>support@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="service">
                            <h3 class="section_title">CUSTOMER SERVICE</h3>
                            <ul class="list-item">
                                <li>
                                    <p>334 Nguyễn Trãi - Thanh Xuân - Hà Nội</p>
                                </li>
                                <li>
                                    <p>19008199</p>
                                </li>
                                <li>
                                    <p>cskh@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p>Chúng tôi mong muốn lắng nghe ý kiến của quý khách.Vui lòng gửi mọi yêu cầu, thắc mắc theo thông tin bên dưới, chúng tôi sẽ liên lạc sớm nhất có thể. Xin cảm ơn!</p>
                    <form class="customer-service" action="">
                        <label for="">Họ và tên</label>
                        <input type="text">
                        <label for="">Email</label>
                        <input type="email">
                        <label for="">Số điện thoại</label>
                        <input type="text">
                        <label for="">Nội dung</label>
                        <textarea name="" id="" cols="60" rows="8"></textarea>
                        <input type="submit" id="submit" value="Gửi phản hồi">
                    </form>
                </div>
            </div>
        </div>
        <?php get_sidebar('best') ?>
    </div>
</div>
</div>

<?php

get_footer();
?>