<?php

// Lấy thông tin danh sách mua hàng
function get_list_order() {
    $list = db_fetch_array("SELECT orders.*, customer.fullname, customer.phone
    FROM `orders`
    JOIN `customer` ON customer.customer_id = orders.customer_id
    ORDER BY orders.order_id DESC
    LIMIT 10
    ");
    return $list;
}

// Lấy sản phẩm theo trạng thái
function get_status($status = "") {
    $list = db_fetch_array("SELECT orders.status 
    FROM `orders`
    WHERE orders.status = '$status'
    ");

    return $list;
}

// Lấy tổng tiền đơn hàng đã hoàn thành
function get_total_price() {
    $total = db_fetch_array("SELECT orders.total_amount FROM `orders` WHERE status = 'delivered'");
    return $total;
}

// Lấy tổng số lượng kho
function get_total_qty() {
    $total = 0;
    $qty = db_fetch_array("SELECT products.stock_quantity FROM `products`");

    foreach($qty as $q) {
        $total += $q['stock_quantity'];
    }
    return $total;
}