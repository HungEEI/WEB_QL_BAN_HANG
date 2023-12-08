<?php

function construct() {
    load('lib', 'validation');
    load('helper', 'pagging');
    load_model('cat');
    load_model('post');
}

function addAction() {
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-add'])) {
        $post_title = $_POST['post-title'];
        $post_slug = create_slug($_POST['post-slug']);    
        $category_id = $_POST['sl-cat'];
        $post_except = $_POST['post-except'];
        $post_content = $_POST['post-content'];
        $image_id = $_POST['image_id'];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'post_category_id' => $category_id,
            'image_id' => $image_id,
            'post_title' => $post_title,
            'post_slug' => $post_slug,
            'post_except' => $post_except,
            'post_content' => $post_content,   
            'created_at' => date('Y-m-d H:i:s'),     
        ];
        db_insert("posts", $data);
    } 
    load_view('add-post');
}

function listAction() {
    load_view('list-post');
}

function deleteAction() {
    $id = $_GET['id'];

    // Lấy image_url từ CSDL
    $image_url = db_fetch_row("SELECT images.image_id, images.image_url
    FROM `posts`
    JOIN `images` ON posts.image_id = images.image_id
    WHERE `post_id` = $id
    ");

    // Xóa ảnh trong thư mục
    if ($image_url) {
        $path_to_image = "../admin/" . $image_url['image_url'];
        if (file_exists($path_to_image)) {
            unlink($path_to_image); // Xóa tệp ảnh trong thư mục
        }
    }
    $image_id = $image_url['image_id'];
    db_delete("posts", "`post_id` = $id");
    db_delete("images", "`image_id` = $image_id");
    redirect("?mod=post&action=list");
}

function updateAction() {
    $id = $_GET['id'];
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-update'])) {
        $post_title = $_POST['post-title'];
        $post_slug = create_slug($_POST['post-slug']);    
        $category_id = $_POST['sl-cat'];
        $post_except = $_POST['post-except'];
        $post_content = $_POST['post-content'];
        $status = isset($_POST['status']) ? $_POST['status'] : 'active';

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'post_category_id' => $category_id,
            'post_title' => $post_title,
            'post_slug' => $post_slug,
            'post_except' => $post_except,
            'post_content' => $post_content, 
            'status' => $status,  
            'updated_at' => date('Y-m-d H:i:s'),     
        ];
        db_update("posts", $data, "post_id = $id");
        load_view('list-post');
    }else {
        load_view('update-post');
    }
}
