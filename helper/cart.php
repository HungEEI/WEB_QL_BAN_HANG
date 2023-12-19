<?php
// Lấy danh sách sản phẩm giỏ hàng
function get_list_by_cart(){
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart']['buy'] as &$item){ // Thêm tham trị 
            $item['url_delete_cart'] = "?mod=cart&controller=index&action=delete&id={$item['product_id']}";
        }
        return $_SESSION['cart']['buy'];
    }
}

// Lấy tổng số sản phẩm mua
function get_num_oder_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['info']['num_order'];
    }
    return false;
}

// Lấy tổng giá tiền mua
function get_total_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}

// Lấy tất cả image_url
function get_all_product_img5() {
    $list_img = db_fetch_array("SELECT product_images.product_id, GROUP_CONCAT(images.image_url) AS image_urls
    FROM `product_images`  
    JOIN `images` ON product_images.image_id = images.image_id
    GROUP BY product_images.product_id, product_images.pin
    ORDER BY product_images.pin DESC
    ");

    return $list_img;
}

function get_search_5() {
    $list_product = db_fetch_array("SELECT products.*, product_categories.category_name
    FROM `products`
    JOIN `product_categories` ON products.product_category_id = product_categories.product_category_id
    LIMIT 5
    ");
    foreach ( $list_product as &$p) {
        $slug = create_slug($p['product_slug']);
        $p['url'] = "san-pham/chi-tiet/{$p['product_id']}-{$slug}.html";
        $p['url_checkout'] = "don-mua/{$p['product_id']}-thanh-toan.html";
        $p['url_cart'] = "gio-hang-{$p['product_id']}/don-mua.html";
    }

    $all_products = array();
    $image_data = get_all_product_img5();

    foreach ($list_product as $product) {
        $product_id = $product['product_id'];

        // Tìm ảnh tương ứng với product_id trong dữ liệu ảnh đã lấy
        foreach ($image_data as $img) {
            if ($img['product_id'] == $product_id) {
                $product['thumb'] = explode(',', $img['image_urls']);
                break;
            }
        }

        $all_products[] = $product;
    }

    return $all_products;
}
?>