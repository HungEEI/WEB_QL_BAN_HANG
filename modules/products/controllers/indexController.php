<?php

function construct() {
    load_model('index');
    load_model('all');
    load('helper', 'pagging');
}

function indexAction() {
    load_view('index');
}

function allAction() {
    load_view('all-cat');
}

function detailAction() {
    load_view('detail-product');
}

function searchmainAction() {
    $list = get_all_products();
    $results = [];
    $num = 0;

    if(isset($_GET['btn-smain'])) {
        $search = $_GET['s'];
        if(empty($search)) {
            echo "Yêu cầu nhập lại";
        }else {
            $sql = "SELECT products.product_id, products.product_slug, products.status, products.product_name, products.product_price, products.product_discount, product_categories.category_name
            FROM `products` 
            JOIN product_categories ON product_categories.product_category_id = products.product_category_id
            WHERE CONCAT(product_name, category_name) LIKE '%" . $search . "%'
            ORDER BY products.product_id DESC
            ";
            $results = db_fetch_array($sql);
            foreach ($results as &$product) {
                $product['thumb'] = get_info_product_img($product['product_id']);
            }
            $num = count($results);
            foreach ($results as &$p) {
                $slug = create_slug($p['product_slug']);
                $p['url'] = "san-pham/chi-tiet/{$p['product_id']}-{$slug}.html";
                $p['url_checkout'] = "don-mua/{$p['product_id']}-thanh-toan.html";
                $p['url_cart'] = "gio-hang-{$p['product_id']}/don-mua.html";
            }
        }
    }
    load_view('search', ['all-cat' => $list, 'results' => $results, 'num' => $num]);
}
