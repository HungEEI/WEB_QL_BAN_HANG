<?php
get_header();
?>

<?php
$all_products = get_all_products();
$num_row = count($all_products);
// Số lượng bản ghi trên trang
$num_per_page = 8;
//Tổng số bản ghi
$total_row = $num_row;
// Tính tổng số trang   
$num_page = ceil($total_row / $num_per_page);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $num_per_page;

$current_page_products = array_slice($all_products, $start, $num_per_page);
?>

<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Tất cả sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Tất cả sản phẩm</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <?php echo $num_per_page ?> trên <?php echo count(get_all_products()) ?> sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php 
                        $temp = 0;
                        foreach($current_page_products as $product) {
                            if($product['status'] == 'active') {
                                $temp++;
                                ?>
                                <li class="col-4">
                                    <a href="<?php echo $product['url'] ?>" title="" class="thumb">
                                        <img src="../admin/<?php echo $product['thumb'][0] ?>">
                                    </a>
                                    <a href="<?php echo $product['url'] ?>" title="" class="product-name"><?php echo $product['product_name'] ?></a>
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
            <?php
            echo get_pagging($num_page, $page, $base_url = "?mod=products&controller=index&action=all");
            ?>
        </div>
        <?php get_sidebar('product') ?>
    </div>
</div>
</div>

<?php
get_footer();
?>