<?php

use Monolog\Formatter\MongoDBFormatter;

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
    $list_product = db_fetch_array("SELECT products.*, users.fullname, product_categories.category_name
    FROM `products`
    JOIN `users` ON products.user_id = users.user_id
    JOIN `product_categories` ON products.product_category_id = product_categories.product_category_id
    ");
    foreach ($list_product as &$p) {
        $slug = create_slug($p['product_slug']);
        $p['url'] = "san-pham/chi-tiet/{$p['product_id']}-{$slug}.html";
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

// Lấy tên danh mục theo id
function get_category_name_by_id($id) {
    $cat_id = db_fetch_row("SELECT category_name FROM `product_categories` WHERE `product_category_id` = $id");
    return $cat_id; 
}

# Lấy tất cả sản phẩm của product_cat
function get_all_products_by_category($id) {
    $categories = get_all_subcat($id);
    $categories[] = $id;

    $items = db_fetch_array("SELECT products.*, product_categories.parent_id
        FROM `products`
        JOIN `product_categories` ON products.product_category_id = product_categories.product_category_id
        WHERE products.product_category_id IN (" . implode(",", $categories) . ")
    ");

    $product_thumb = array();
    foreach ($items as $product) {
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

# Lấy tất cả danh mục con của product_cat
function get_all_subcat($parent_id) {
    $all_subcat = [];
    // Lấy danh mục con trực tiếp của $parent_id
    $subcats = db_fetch_array("SELECT product_category_id FROM `product_categories` WHERE parent_id = $parent_id");
    foreach ($subcats as $subcat) {
        $all_subcat[] = $subcat['product_category_id'];
        // Gọi đệ quy lấy tất cả danh mục con
        $all_subcat = array_merge($all_subcat, get_all_subcat($subcat['product_category_id']));
    }

    return $all_subcat;
}

// Lấy thông tin sliders
function get_info_sliders() {
    $sliders = db_fetch_array("SELECT sliders.*, images.image_url
    FROM `sliders`
    JOIN `images` ON sliders.image_id = images.image_id
    ");

    return $sliders;
}
