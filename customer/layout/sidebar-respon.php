<?php
$list_cat = db_fetch_array("SELECT * FROM `product_categories`");
load('helper', 'menurespon');
?>

<div id="menu-respon">
    <a href="?" title="" class="logo">Danh mục</a>
    <div id="menu-respon-wp">  
        <?php echo render_menu_respon($list_cat) ?>
    </div>
</div>