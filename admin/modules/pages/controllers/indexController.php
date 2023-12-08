<?php

function construct() {
    load_model('index');
}

function addAction() {
    global $error, $page_title, $page_content, $page_slug;
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-add-page'])) {
        $error = array();
        if(empty($_POST['page-title'])) {
            $error['page-title'] = "Hãy nhập Tiêu đề";
        }else {
            $page_title = $_POST['page-title'];
        }

        if(empty($_POST['page-content'])) {
            $error['page-content'] = "Hãy nhập nội dung";
        }else {
            $page_content = $_POST['page-content'];
        }
        $page_slug = $_POST['page-slug'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'page_title' => $page_title,
            'page_slug' => $page_slug,
            'page_content' => $page_content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        db_insert('pages', $data);
    }
    load_view('add-pages');
}

function listAction() {
    load_view('list-pages');
}

function deleteAction() {
    $id = $_GET['id'];
    db_delete("pages", "`page_id` = $id");
    redirect("?mod=pages&action=list");
}

function updateAction() {
    $id = $_GET['id'];
    $user_id = db_fetch_row("SELECT * FROM `users`");
    if(isset($_POST['btn-update-page'])) {
        $page_title = $_POST['page-title'];
        $page_content = $_POST['page-content'];
        $page_slug = $_POST['page-slug'];
        $status = isset($_POST['status']) ? $_POST['status'] : 'active';

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'user_id' => $user_id['user_id'],
            'page_title' => $page_title,
            'page_slug' => $page_slug,
            'page_content' => $page_content,
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        db_update('pages', $data, "page_id = $id");
        load_view('list-pages');
    }else {
        load_view('update');
    }
}


