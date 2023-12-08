<?php

// Lấy thông tin danh sách mua hàng
function get_list_order() {
    $list = db_fetch_array("SELECT orders.*, customer.fullname, customer.phone
    FROM `orders`
    JOIN `customer` ON customer.customer_id = orders.customer_id
    ");
    return $list;
}

// Lấy ảnh detail order theo pin = 1
function image_by_proudct_id_pin($product_id) {
    $image = db_fetch_row("SELECT images.image_url, product_images.pin
    FROM `product_images`
    JOIN `images` ON product_images.image_id = images.image_id
    WHERE product_images.product_id = '{$product_id}'
    ");
    return $image;
}

// Lầy thông tin customer 
function get_info_customer($order_id) {
    $customer = db_fetch_row("SELECT customer.email
    FROM `orders`
    JOIN `customer` ON customer.customer_id = orders.customer_id
    WHERE orders.order_id = '{$order_id}'
    ");
    return $customer;
}

// Lấy thông tin chi tiết orders theo id
function get_order_detail_by_id() {
    $id = $_GET['id'];
    $detail = db_fetch_array("SELECT orders.*, order_items.price, order_items.quantity, products.product_id, products.product_code, products.product_name
    FROM `order_items`
    JOIN `orders` ON orders.order_id = order_items.order_id
    JOIN `products` ON order_items.product_id = products.product_id
    WHERE order_items.order_id = '{$id}'
    ");
    
    foreach($detail as &$product) { 
        $product_id = $product['product_id'];
        $images = image_by_proudct_id_pin($product_id);
         // Thêm thông tin ảnh vào mảng chi tiết
         $product['thumb'] = $images;

         $order_id = $product['order_id'];
         $id = get_info_customer($order_id);
         $product['customer'] = $id;
    }


    return $detail;
}

//Lấy customer_id
function get_customer_id_by_order_id($id) {
    $customer = db_fetch_row("SELECT orders.customer_id
    FROM `orders`
    WHERE orders.order_id = '{$id}'
    ");
    return $customer;
}

// Lấy sản phẩm theo trạng thái
function get_status($status = "") {
    $list = db_fetch_array("SELECT orders.status 
    FROM `orders`
    WHERE orders.status = '$status'
    ");

    return $list;
}



