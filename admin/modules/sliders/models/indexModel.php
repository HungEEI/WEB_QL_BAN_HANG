<?php 

function get_slider() {
    $slider = db_fetch_array("SELECT sliders.*, users.fullname, images.image_url
                FROM `sliders`
                INNER JOIN `users` ON sliders.user_id = users.user_id
                INNER JOIN `images` ON sliders.image_id = images.image_id"
                );
    return $slider;
}

// Lấy sản phẩm theo id
function get_slider_by_id() {
    $id = $_GET['id'];
    $slider = db_fetch_row("SELECT sliders.*
    FROM `sliders` 
    WHERE `slider_id` = $id");

    return $slider;
}

?>