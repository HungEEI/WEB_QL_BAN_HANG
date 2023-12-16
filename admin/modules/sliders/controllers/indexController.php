<?php

function construct() {
    load_model('index');
    load('helper', 'pagging');
}

function addAction() {
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-add-slider'])) {
        $error = array();
        $slider_name = $_POST['slider-name'];
        $slider_slug = $_POST['slider-slug'];
        $image_id = $_POST['image_id'];
        $status = isset($_POST['status']) ? $_POST['status'] : 'active'; 
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'image_id' => $image_id,
            'slider_name' => $slider_name,
            'slider_slug' => $slider_slug,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        db_insert('sliders', $data);
    }
    load_view('add-sliders');
}

function listAction() {
    load_view('list-sliders');
}

function deleteAction() {
    $id = $_GET['id'];

    // Lấy image_url từ CSDL
    $image_url = db_fetch_row("SELECT images.image_id, images.image_url
    FROM `sliders`
    JOIN `images` ON sliders.image_id = images.image_id
    WHERE `slider_id` = $id
    ");

    // Xóa ảnh trong thư mục
    if ($image_url) {
        $path_to_image = "../admin/" . $image_url['image_url'];
        if (file_exists($path_to_image)) {
            unlink($path_to_image); // Xóa tệp ảnh trong thư mục
        }
    }
    $image_id = $image_url['image_id'];
    db_delete("sliders", "`slider_id` = $id");
    db_delete("images", "`image_id` = $image_id");
    redirect("?mod=sliders&controller=index&action=list");
}

function updateAction() {
    $id = $_GET['id'];
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-add-slider'])) {
        $error = array();
        $slider_name = $_POST['slider-name'];
        $slider_slug = $_POST['slider-slug'];
        // $image_id = $_POST['image_id'];
        $status = isset($_POST['status']) ? $_POST['status'] : 'active'; 
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            // 'image_id' => $image_id,
            'slider_name' => $slider_name,
            'slider_slug' => $slider_slug,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        db_update('sliders', $data, "slider_id = $id");
        load_view('list-sliders');
    }else {
        load_view('update');
    }
}
