<?php

function has_child_respon($data, $id) {
    foreach($data as $v) {
        if($v['parent_id'] == $id) return true;
    }
    return false;
}

function render_menu_respon($data, $parent_id = 0, $level = 0) {
    if($level == 0) {
        $respon = "<ul id='main-menu-respon'>";
    } else {
        $respon = "<ul class='sub-menu'>";
    }

    foreach($data as $u) {
        if($u['parent_id'] == $parent_id) {
            $respon .= "<li>";
            $respon .= "<a href='?mod=products&controller=index&action=index&id={$u['product_category_id']}' title=''>{$u['category_name']}</a>";
            if(has_child_respon($data, $u['product_category_id'])) {
                $respon .= render_menu_respon($data, $u['product_category_id'], $level + 1);
            }
            $respon .= "</li>";
        }
    }
    $respon .= "</ul>";
    return $respon;
}