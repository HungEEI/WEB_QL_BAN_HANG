<?php
// Lấy danh sách sản phẩm giỏ hàng
function get_list_by_cart(){
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart']['buy'] as &$item){ // Thêm tham trị 
            $item['url_delete_cart'] = "?mod=cart&controller=index&action=delete&id={$item['product_id']}";
        }
        return $_SESSION['cart']['buy'];
    }
}

// Lấy tổng số sản phẩm mua
function get_num_oder_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['info']['num_order'];
    }
    return false;
}

// Lấy tổng giá tiền mua
function get_total_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}
?>