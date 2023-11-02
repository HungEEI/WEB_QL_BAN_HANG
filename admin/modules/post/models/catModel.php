<?php

# Kiểm tra xem có phần tử nào nhận $id làm cha không
function hash_child($data, $id) {
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
            if(hash_child($data, $v['post_category_id'])) {
                $result_child = data_tree($data, $v['post_category_id'], $level + 1);
                $result = array_merge($result, $result_child);
            }
        }
    }
    return $result;
}

?>
