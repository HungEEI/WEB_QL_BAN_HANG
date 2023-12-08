<?php

// Lấy tất cả image_url
function get_all_product_img() {
    $list_img = db_fetch_array("SELECT product_images.product_id, GROUP_CONCAT(images.image_url) AS image_urls
    FROM `product_images`  
    JOIN `images` ON product_images.image_id = images.image_id
    GROUP BY product_images.product_id, product_images.pin
    ORDER BY product_images.pin DESC
    ");

    return $list_img;
}

function get_all_products() {
    $list_product = db_fetch_array("SELECT products.*, product_categories.category_name
    FROM `products`
    JOIN `product_categories` ON products.product_category_id = product_categories.product_category_id
    ");

    $all_products = array();
    $image_data = get_all_product_img();

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