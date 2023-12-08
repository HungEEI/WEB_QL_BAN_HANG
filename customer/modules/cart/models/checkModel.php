<?php

# Thông báo lỗi
function form_error($label_field) {
    global $error;
    if(!empty($error[$label_field])) return "<p class='error'>{$error[$label_field]}</p>";      
}

// Lấy thông tin đơn hàng thanh toán
function get_success_info() {
    $id = $_GET['id'];
    $info = db_fetch_row("SELECT customer.*, orders.order_date, orders.payment_method, orders.order_code
    FROM `customer`
    INNER JOIN `orders` ON customer.customer_id = orders.customer_id
    WHERE customer.customer_id = $id
    ");   
    return $info;
}

