<?php

function construct() {
    load_model('cat');
}

function addAction() {
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-cat-pro'])) {
        $category_name = $_POST['cat-title'];      
        $category_slug = create_slug($_POST['cat-slug']);
        $parent_id = isset($_POST['cat']) ? (int)$_POST['cat'] : 0;
    
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'parent_id' => $parent_id,
            'category_name' => $category_name,
            'category_slug' => $category_slug,
            'created_at' => date('Y-m-d H:i:s')
        ];
        db_insert('product_categories', $data);
    }
    load_view('cat-product');
}

function deleteAction() {
    $id = $_GET['id'];
    db_delete("product_categories", "`product_category_id` = $id");
    redirect("?mod=products&controller=cat&action=add");
}

?>