<?php

function construct() {
    load('lib', 'validation');
    load_model('cat');
    load_model('product');
    load('helper', 'format');
    load('helper', 'pagging');
}

function addAction() {
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-add-product'])) {
        $product_name = $_POST['product-name'];
        $product_slug = $_POST['product-slug'];
        $stock_quantity = $_POST['product-qty'];
        $product_price = $_POST['product-price'];
        $product_discount = $_POST['product-discount'];
        $product_desc = $_POST['product-desc'];
        $product_detail = $_POST['product-detail'];
        $category_id = $_POST['sl-cat'];
        $featured = isset($_POST['is-featured']) ? 1 : 0;
        $status = isset($_POST['status']) ? $_POST['status'] : 'active';      
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'product_category_id' => $category_id,
            'product_code' => "",
            'product_name' => $product_name,
            'product_slug' => $product_slug,
            'stock_quantity' => $stock_quantity,
            'product_price' => $product_price,
            'product_discount' => $product_discount,
            'product_desc' => $product_desc,
            'product_detail' => $product_detail,
            'is_featured' => $featured,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'), 
        ];
        $product_id = db_insert('products', $data);          // id sản phẩm khi submit
        $code_name = "#NVH";
        $update_code_product = [
            'product_code' => $code_name.$product_id
        ];
        db_update('products', $update_code_product, "product_id = {$product_id}");

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

function deleteAction() {
    $id = $_GET['id'];

    // Lấy danh sách image_url từ CSDL
    $image_urls = db_fetch_array("SELECT image_url FROM images WHERE `image_id` IN (SELECT image_id FROM product_images WHERE `product_id` = $id)");

    // Xóa các ảnh trong thư mục
    foreach ($image_urls as $image) {
        $image_url = $image['image_url'];
        $path_to_image = "../admin/" . $image_url;
        if (file_exists($path_to_image)) {
            unlink($path_to_image); // Xóa tệp ảnh trong thư mục
        }
    }

    // Xóa các bản ghi trong bảng sliders liên quan đến product
    db_query("DELETE FROM sliders WHERE image_id IN (SELECT image_id FROM product_images WHERE `product_id` = $id)");
    // Xóa bản ghi trong bảng product_images
    db_delete("product_images", "`product_id` = $id");
    // Xóa bản ghi trong bảng products
    db_delete("products", "`product_id` = $id");
    redirect("?mod=products&controller=index&action=list");
}

function updateAction() {
    $id = $_GET['id'];
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-update-product'])) {
        $product_code = $_POST['product-code'];
        $product_name = $_POST['product-name'];
        $product_slug = create_slug($_POST['product-slug']);
        $stock_quantity = $_POST['product-qty'];
        $product_price = $_POST['product-price'];
        $product_discount = $_POST['product-discount'];
        $product_desc = $_POST['product-desc'];
        $product_detail = $_POST['product-detail'];
        $category_id = $_POST['sl-cat'];
        $featured = isset($_POST['is-featured']) ? 1 : 0;
        $status = isset($_POST['status']) ? $_POST['status'] : 'active';
    
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'product_category_id' => $category_id,
            'product_code' => $product_code,
            'product_name' => $product_name,
            'product_slug' => $product_slug,
            'stock_quantity' => $stock_quantity,
            'product_price' => $product_price,
            'product_discount' => $product_discount,
            'product_desc' => $product_desc,
            'product_detail' => $product_detail,
            'is_featured' => $featured,
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s'), 
        ];

        db_update('products', $data, "product_id = $id");  // id sản phẩm khi submit

        // #** đưa id ảnh vào bảng riêng biệt
        // $image_ids = $_POST['image_id'];
        // $image_ids_array = explode(',', $image_ids);  // chuỗi thành mảng vì value hidden là chuỗi
        // $first_img = true;
        // if (is_array($image_ids_array)) {
        //     foreach($image_ids_array as $image_id) {            
        //         $pin = $first_img ? 1 : 0;
        //         $data_img = [
        //             'product_id' => $product_id,
        //             'image_id' => $image_id,
        //             'pin' => $pin,
        //         ];

        //         db_insert('product_images', $data_img);
        //         $first_img = false;
        //     }
        // }
        load_view('list-product');
    }else {
        load_view('update-product');
    }
}


?>