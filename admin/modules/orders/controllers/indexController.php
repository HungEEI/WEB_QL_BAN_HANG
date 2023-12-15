<?php

function construct() {
    load_model('index');
    load('helper', 'format');
    load('helper', 'pagging');
}

function indexAction() {
    load_view('index');
}

function detailAction() {
   load_view('detail');
}

function deleteAction() {
    $id = $_GET['id'];
    $customer_id = get_customer_id_by_order_id($id);
    db_delete('order_items', "`order_id` = $id");
    db_delete('orders', "`order_id` = $id");
    db_delete('customer', "`customer_id` = {$customer_id['customer_id']}");
    load_view('index');
}

function updateAction() {
    if(isset($_POST['btn-status'])) {
        $error = array();
        if(empty($_POST['status'])) {
            $error['status'] = "Hãy chọn trạng thái";
        } else {
            $status = $_POST['status'];
        }

        $order_status = [
            'status' => $status
        ];

        db_update('orders', $order_status, "order_id = '{$_GET['id']}'");
    }
    load_view('detail');
}

function searchAction() {
    $list = get_list_order();
    $results = [];
    $num = 0;

    if(isset($_GET['btn-search'])) {
        $search = $_GET['search'];
        if(empty($search)) {
            echo "Yêu cầu nhập lại";
        }else {
            $sql = "SELECT * FROM `orders` 
            JOIN `customer` ON orders.customer_id = customer.customer_id
            WHERE CONCAT(order_code, order_id, order_date, total_amount, fullname) LIKE '%" . $search . "%'
            ORDER BY orders.order_id DESC
            ";
            $results = db_fetch_array($sql);
            $num = count($results);
        }
    }
    load_view('index', ['list_order' => $list, 'results' => $results, 'num' => $num]);
}