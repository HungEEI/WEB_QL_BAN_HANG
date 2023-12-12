<?php
get_header();
?>

<?php
$info_product = get_info_product_by_id();
?>

<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="<?php echo $info_product['url'] ?>" title="">
                            <img src="../admin/<?php echo $info_product['thumb'][0]; ?>" alt="<?php echo $info_product['product_name']; ?>">
                        </a>
                        <div id="list-thumb">
                            <?php
                            foreach($info_product['thumb'] as $image) {
                                ?>
                                <a href="../admin/<?php echo $image; ?>">
                                    <img src="../admin/<?php echo $image; ?>" />
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $info_product['product_name']; ?></h3>
                        <div class="desc">
                            <?php echo $info_product['product_desc']; ?>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <?php
                            if($info_product['stock_quantity'] > 0) {
                                ?>
                                <span class="status">Còn hàng</span>
                                <?php
                            } else {
                                ?>
                                <span class="status">Hết hàng</span>
                                <?php
                            }
                            ?>
                        </div>
                        <p class="price"><?php echo currency_format($info_product['product_price']); ?></p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="<?php echo $info_product['url_cart'] ?>" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                   <?php echo $info_product['product_detail']; ?>
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php                      
                        foreach(get_product_related_by_id(3) as $p) {
                            ?>
                            <li>
                                <a href="<?php echo $p['url'] ?>" title="" class="thumb">
                                    <img src="../admin/<?php echo $p['thumb'][0] ?>">
                                </a>
                                <a href="" title="" class="product-name"><?php echo $p['product_name'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($p['product_price']) ?></span>
                                    <span class="old"><?php echo currency_format($p['product_discount']) ?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="<?php $p['url_cart'] ?>" title="" class="add-cart add-cart-none add-cart-block fl-left">Thêm giỏ hàng</a>
                                    <a href="<?php echo $p['url_checkout'] ?>" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <?php
                        }
                        ?>                   
                    </ul>
                </div>
            </div>
        </div>
        <?php
        get_sidebar();
        ?>
    </div>
</div>

<?php
get_footer();
?>
