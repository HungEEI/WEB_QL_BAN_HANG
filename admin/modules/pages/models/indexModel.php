<?php

function get_page_by_id() {
    $id = $_GET['id'];
    $page = db_fetch_row("SELECT * FROM `pages` WHERE `page_id` = $id");

    return $page;
}

?>