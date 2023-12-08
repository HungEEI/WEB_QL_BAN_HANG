<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load_view('index');
}

function addAction() {
    $id = $_GET['id'];
    $product = get_product_by_id($id);
    # Thêm thông tin vào giỏ hàng
    $product_quantity = 1; // Mặc định số lượng ban đầu là 1
    // Kiểm tra xem giỏ hàng đã tồn tại chưa và id đã từng có trong mảng sp đã mua chưa
    if(isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])){
        $product_quantity = $_SESSION['cart']['buy'][$id]['qty'] + 1; // sản phẩm + 1
    }

    $item = [
        'product_id' => $product['product_id'],
        'product_code' => $product['product_code'],
        'product_name' => $product['product_name'],
        'product_slug' => $product['product_slug'],
        'image_url' => $product['thumb'][0],
        'product_price' => $product['product_price'],
        'qty' =>  $product_quantity,
        'product_total_money' => $product['product_price'] * $product_quantity,
    ];
    $_SESSION['cart']['buy'][$id] = $item;
    // Cập nhật hóa đơn
    update_info_cart();
    load_view('index');
}

function deleteAction() {
   $id = $_GET['id'];
   delete_cart($id);
   load_view('index');
}

function updateAction() {
    if(isset($_POST['btn_update_cart'])){
        update_cart($_POST['qty']);
        load_view('index'); 
    }
}