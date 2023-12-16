
<?php 
# Lấy thông tin ảnh
function get_info_product_img($product_id) {
    $list_img = db_fetch_array("SELECT product_images.*, images.image_url
    FROM `product_images`  
    JOIN `images` ON product_images.image_id = images.image_id
    WHERE product_images.product_id = $product_id
    ORDER BY product_images.pin DESC
    ");

    return $list_img;
}

# Lấy thông tin danh sách sản phẩm
function get_info_list_product() {
    $list_product = db_fetch_array("SELECT products.product_id, products.product_name, products.product_price, products.product_discount, products.product_slug, products.is_featured
    FROM `products`
    WHERE products.is_featured = 1
    ");
    foreach ($list_product as &$p) {
        $slug = create_slug($p['product_slug']);
        $p['url'] = "san-pham/chi-tiet/{$p['product_id']}-{$slug}.html";
        $p['url_checkout'] = "don-mua/{$p['product_id']}-thanh-toan.html";
    }

    $product_thumb = array();
    foreach ($list_product as $product) {
        $list_img = get_info_product_img($product['product_id']);
        $image_urls = array();      
        foreach ($list_img as $img) {
            $image_urls[] = $img['image_url'];
        }     
        $product['thumb'] = $image_urls;
        $product_thumb[] = $product;
    }
    return $product_thumb;
}
?>
<div class="sidebar fl-left">
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php 
                        $list = get_info_list_product();
                        foreach($list as $pin) {
                            ?>
                            <li class="clearfix">
                                <a href="<?php echo $pin['url'] ?>" title="" class="thumb fl-left">
                                    <img src="admin/<?php echo $pin['thumb'][0] ?>" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="<?php echo $pin['url'] ?>" title="" class="product-name"><?php echo $pin['product_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($pin['product_price']) ?></span>
                                        <span class="old"><?php echo currency_format($pin['product_discount']) ?></span>
                                    </div>                             
                                    <a href="<?php echo $pin['url_checkout'] ?>" title="" class="buy-now">Mua ngay</a>
                                </div>
                            </li>
                            <?php
                        }
                        ?>                    
                    </ul>
                </div>
            </div>
        </div>