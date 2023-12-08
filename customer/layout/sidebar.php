<?php
$list_cat = db_fetch_array("SELECT * FROM `product_categories`");
foreach ($list_cat as &$p) {
    $slug = create_slug($p['category_slug']);
    $p['url_cat'] = "danh-muc/{$p['product_category_id']}-{$slug}.html";
}
load('helper', 'menu')
?>

<div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                    <?php echo render_menu($list_cat) ?>                
                </div>
            </div>       
        </div>    