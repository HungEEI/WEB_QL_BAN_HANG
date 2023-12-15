<?php

// Lấy thông tin tất cả ảnh theo id 
function get_info_product_img($product_id) {
    $list_img = db_fetch_array("SELECT product_images.pin, images.image_url
    FROM `product_images`  
    JOIN `images` ON product_images.image_id = images.image_id
    WHERE product_images.product_id = $product_id 
    ");

    return $list_img;
}

// Lấy thông tin tất cả sản phẩm
function get_info_list_product() {
    $list_product = db_fetch_array("SELECT products.*, users.fullname, product_categories.category_name
    FROM `products`
    JOIN `users` ON products.user_id = users.user_id
    JOIN `product_categories` ON products.product_category_id = product_categories.product_category_id
    ORDER BY products.product_id DESC
    ");

    foreach ($list_product as &$product) {
        $product['thumb'] = get_info_product_img($product['product_id']);
    }

    return $list_product;
}

// Lấy sản phẩm theo id
function get_product_by_id() {
    $id = $_GET['id'];
    $product = db_fetch_row("SELECT products.*, product_categories.category_name
    FROM `products` 
    JOIN `product_categories` ON products.product_category_id = product_categories.product_category_id
    WHERE `product_id` = $id");

    return $product;
}

// Lấy trạng thái sản phẩm 
function get_status_product($status = "") {
    $list = db_fetch_array("SELECT products.status FROM `products` WHERE products.status = '$status'");
    return $list;
}

?>