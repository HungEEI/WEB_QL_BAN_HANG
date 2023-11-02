<?php

function construct() {
    load('lib', 'validation');
    load_model('cat');
}

function addAction() {
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-add-product'])) {
        $product_code = $_POST['product-code'];
        $product_name = $_POST['product-name'];
        $product_slug = $_POST['product-slug'];
        $product_price = $_POST['product-price'];
        $product_discount = $_POST['product-discount'];
        $product_desc = $_POST['product-desc'];
        $product_detail = $_POST['product-detail'];
        $category_id = $_POST['sl-cat'];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'product_category_id' => $category_id,
            'product_code' => $product_code,
            'product_name' => $product_name,
            'product_slug' => $product_slug,
            'product_price' => $product_price,
            'product_discount' => $product_discount,
            'product_desc' => $product_desc,
            'product_detail' => $product_detail,
            'created_at' => date('Y-m-d H:i:s'), 
        ];

        $product_id = db_insert('products', $data);          // id sản phẩm khi submit

        #** đưa id ảnh vào bảng riêng biệt
        $image_ids = $_POST['image_id'];
        $image_ids_array = explode(',', $image_ids);  // chuỗi thành mảng vì value hidden là chuỗi
        $first_img = true;
        if (is_array($image_ids_array)) {
            foreach($image_ids_array as $image_id) {            
                $pin = $first_img ? 1 : 0;
                $data_img = [
                    'product_id' => $product_id,
                    'image_id' => $image_id,
                    'pin' => $pin,
                ];

                db_insert('product_images', $data_img);
                $first_img = false;
            }
        }

    }
    load_view('add-product');
}

function listAction() {
    load_view('list-product');
}

function catAction() {
    load_view('cat-product');
}

