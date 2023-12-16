<?php

// Lấy tất cả image_url theo id 
function get_info_product_img($id) {
    $list_img = db_fetch_array("SELECT images.image_url
    FROM `product_images`  
    JOIN `images` ON product_images.image_id = images.image_id
    WHERE product_images.product_id = $id
    ORDER BY product_images.pin DESC
    ");

    return $list_img;
}

// Lấy thông tin sản phẩm theo id
function get_product_by_id() {
    $id = $_GET['id'];
    $list_product = db_fetch_array("SELECT products.*, product_categories.category_name
    FROM `products`
    JOIN `product_categories` ON products.product_category_id = product_categories.product_category_id
    WHERE products.product_id = $id
    ");

    $all_image_urls = array();
    foreach ($list_product as &$product) {
        $product['thumb'] = get_info_product_img($id);

        foreach ($product['thumb'] as $thumb) {
            $all_image_urls[] = $thumb['image_url'];
        }
    }
    $list_product[0]['thumb'] = $all_image_urls;

    return $product;
}

// Lấy sản phẩm theo id
function get_product_by_id_ajax($id) {
    $product = db_fetch_row("SELECT products.*
    FROM `products` 
    WHERE `product_id` = $id");

    return $product;
}

function update_info_cart(){
    if(isset($_SESSION['cart'])){
        $num_order = 0;
        $total = 0;
        foreach($_SESSION['cart']['buy'] as $item){
            $num_order += $item['qty'];
            $total += $item['product_total_money'];
        }
        $_SESSION['cart']['info'] = array(
            'num_order' => $num_order,
            'total' => $total
        );
    }
}

// Xóa sản phẩm 
function delete_cart($id){
    if(isset($_SESSION['cart'])){
        # Xóa sản phẩm có id trong giỏ hàng
        if(!empty($id)){
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        }else{
            unset($_SESSION['cart']);           
        }
    }
}

// Cập nhật giỏ hàng 
function update_cart($qty){
    foreach($qty as $id => $new_qty){
        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
        $_SESSION['cart']['buy'][$id]['product_total_money'] = $new_qty * $_SESSION['cart']['buy'][$id]['product_price'];
    }
    update_info_cart();
}

function delete_cart_buy(){
    if(isset($_SESSION['cart'])){
        unset($_SESSION['cart']);
    }
}

?>