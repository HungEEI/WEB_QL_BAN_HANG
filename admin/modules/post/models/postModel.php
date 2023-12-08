<?php
function get_info_list_post() {

    $list_post = db_fetch_array("SELECT posts.*, users.fullname, images.image_url, post_categories.category_name
    FROM `posts`
    INNER JOIN `users` ON posts.user_id = users.user_id
    INNER JOIN `images` ON posts.image_id = images.image_id
    INNER JOIN `post_categories` ON posts.post_category_id = post_categories.post_category_id");

    return $list_post;
}

function get_post_by_id() {
    $id = $_GET['id'];
    $post = db_fetch_row("SELECT * FROM `posts` WHERE `post_id` = $id");

    return $post;
}

?>