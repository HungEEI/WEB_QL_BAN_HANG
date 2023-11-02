<?php

function construct() {
    load('lib', 'validation');
    load_model('cat');
}

function addAction() {
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-add'])) {
        $post_title = $_POST['post-title'];
        $post_slug = $_POST['post-slug'];    
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
    db_delete("posts", "`post_id` = $id");
    redirect("?mod=post&action=list");
}
