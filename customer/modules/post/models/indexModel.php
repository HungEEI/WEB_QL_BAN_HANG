<?php

// Lấy tất cả post
function get_all_post() {
    $list_post = db_fetch_array("SELECT posts.*, images.image_url
    FROM `posts`
    JOIN `images` ON posts.image_id = images.image_id
    WHERE posts.status = 'active'
    ");
    foreach ($list_post as &$p) {
        $slug = create_slug($p['post_slug']);
        $p['url'] = "tin-tuc/chi-tiet/{$p['post_id']}-{$slug}.html";
    }
    return $list_post;
}

// Lấy detail post theo id
function get_detail_post_by_id() {
    $id = $_GET['id'];
    $detail = db_fetch_row("SELECT * FROM `posts` WHERE post_id = $id");
    return $detail;
}

