<?php

function construct() {
    load_model('cat');
}

function addAction() {
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-add-cat'])) {
        $category_name = $_POST['cat-title'];      
        $category_slug = $_POST['cat-slug'];
        $parent_id = isset($_POST['parent_id']) ? (int)$_POST['parent_id'] : 0;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'parent_id' => $parent_id,
            'category_name' => $category_name,
            'category_slug' => $category_slug,
            'created_at' => date('Y-m-d H:i:s')
        ];
        db_insert('post_categories', $data);
    }
    load_view('cat-post');
}

function deleteAction() {
    $id = $_GET['id'];
    db_delete("post_categories", "`post_category_id` = $id");
    redirect("?mod=post&controller=cat&action=add");
}

?>