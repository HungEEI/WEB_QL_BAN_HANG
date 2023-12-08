<?php

function construct() {
    load_model('index');
    load('helper', 'format');
}

function indexAction() {
    load_view('index');
}

function deleteAction() {
    $id = $_GET['id'];
    $customer_id = get_customer_id_by_order_id($id);
    db_delete('order_items', "`order_id` = $id");
    db_delete('orders', "`order_id` = $id");
    db_delete('customer', "`customer_id` = {$customer_id['customer_id']}");
    load_view('index');
}

