<?php

# Kiểm tra xem có phần tử nào nhận $id làm cha không

use LDAP\Result;

function has_child($data, $id) {
    foreach($data as $v) {
        if($v['parent_id'] == $id) return true;
    }
    return false;
}

# Danh mục
function data_tree($data, $parent_id = 0, $level = 0) {
    $result = array();
    foreach($data as $v) {
        if($v['parent_id'] == $parent_id) {
            $v['level'] = $level;
            $result[] = $v;
            if(has_child($data, $v['product_category_id'])) {
                $result_child = data_tree($data, $v['product_category_id'], $level + 1);
                $result = array_merge($result, $result_child);
            }
        }
    }
    return $result;
}

function render_menu($data, $parent_id = 0, $level = 0) {
    if($level == 0) {
        $result = "<ul class='list-item'>";
    } else {
        $result = "<ul class='sub-menu'>";
    }

    foreach($data as $u) {
        if($u['parent_id'] == $parent_id) {
            $result .= "<li>";
            $result .= "<a href='{$u['url_cat']}' title=''>{$u['category_name']}</a>";
            if(has_child($data, $u['product_category_id'])) {
                $result .= render_menu($data, $u['product_category_id'], $level + 1);
            }
            $result .= "</li>";
        }
    }
    $result .= "</ul>";
    return $result;
}

?>