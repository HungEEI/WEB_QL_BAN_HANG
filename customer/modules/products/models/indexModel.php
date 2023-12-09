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
function get_info_product_by_id() {
    $id = $_GET['id'];
    $list_product = db_fetch_array("SELECT products.*, product_categories.category_name
    FROM `products`
    JOIN `product_categories` ON products.product_category_id = product_categories.product_category_id
    WHERE products.product_id = $id
    ");
    foreach($list_product as &$p) {
        $slug = create_slug($p['product_slug']);
        $p['url'] = "san-pham/chi-tiet/$id/{$slug}.html";
        $p['url_cart'] = "san-pham/chi-tiet/$id/{$slug}.html";
    }

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

# Lấy tất cả danh mục con của product_cat theo id
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

# Lấy tất cả sản phẩm của product_cat theo id
function get_all_products_category_id() {
    $id = $_GET['id'];
    $categories = get_all_subcat($id);
    $categories[] = $id;

    $items = db_fetch_array("SELECT products.*, product_categories.parent_id
        FROM `products`
        JOIN `product_categories` ON products.product_category_id = product_categories.product_category_id
        WHERE products.product_category_id IN (" . implode(",", $categories) . ")
    ");
    foreach ($items as &$p) {
        $slug = create_slug($p['product_slug']);
        $p['url'] = "san-pham/chi-tiet/{$p['product_id']}-{$slug}.html";
        $p['url_checkout'] = "don-mua/{$p['product_id']}-thanh-toan.html";
        $p['url_cart'] = "gio-hang-{$p['product_id']}/don-mua.html";
    }

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

// Lấy tên danh mục theo id
function get_category_name_by_id() {
    $id = $_GET['id'];
    $cat_name = db_fetch_row("SELECT category_name FROM `product_categories` WHERE `product_category_id` = $id");
    return $cat_name; 
}

// Lấy sản phẩm liên quan theo category_id
function get_product_related_by_id($id) {
    $categories = get_all_subcat($id);
    $categories[] = $id;

    $items = db_fetch_array("SELECT products.product_id, products.product_name, products.product_price, products.product_discount, product_categories.parent_id
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

?>