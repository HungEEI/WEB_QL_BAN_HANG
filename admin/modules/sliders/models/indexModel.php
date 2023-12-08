<?php 

function get_slider() {
    $slider = db_fetch_array("SELECT sliders.*, users.fullname, images.image_url
                FROM `sliders`
                INNER JOIN `users` ON sliders.user_id = users.user_id
                INNER JOIN `images` ON sliders.image_id = images.image_id"
                );
    return $slider;
}

?>