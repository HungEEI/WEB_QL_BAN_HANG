<?php
get_header();
?>
<?php 
$order_cart = get_list_by_cart();
$num_order = get_num_oder_cart();
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=order&controller=index&action=index" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <form action="?mod=cart&controller=index&action=update" method="POST">
                    <?php
                    if($num_order > 0) {
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // show_array($order_cart);                           
                                    foreach($order_cart as $cart) {                           
                                        ?>
                                        <tr>
                                            <td><?php echo $cart['product_code'] ?></td>
                                            <td>
                                                <a href="" title="" class="thumb thumb-none">
                                                    <img src="admin/<?php echo $cart['image_url'] ?>" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?mod=products&controller=index&action=detail&id=<?php echo $cart['product_id'] ?>" title="" class="name-product"><?php echo $cart['product_name'] ?></a>
                                            </td>
                                            <td><?php echo currency_format($cart['product_price']) ?></td>
                                            <td>
                                                <input type="number" data-id="<?php echo $cart['product_id'] ?>" min="1" max="10" name="qty[<?php echo $cart['product_id'] ?>]" value="<?php echo $cart['qty'] ?>" class="num-order">
                                            </td>
                                            <td id="sub-total-<?php echo $cart['product_id'] ?>"><?php echo currency_format($cart['product_total_money']) ?></td>
                                            <td>
                                                <a href="<?php echo $cart['url_delete_cart'] ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right fl-left-total">Tổng giá: <span><?php echo currency_format(get_total_cart()) ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right fl-left-total">
                                                <input type="submit" id="update-cart" name="btn_update_cart" value="Cập nhật giỏ hàng">
                                            <a href="thanh-toan/don-mua.html" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="section" id="action-cart-wp">
                            <div class="section-detail">
                                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                                <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br/>
                                <a href="" title="" id="delete-cart">Xóa giỏ hàng</a>
                            </div>
                        </div>
                        <?php
                    }else {
                        ?>
                        <div style="text-align: center;">
                            <img style="display: block; margin: 0 auto; width: 26%" src="public/images/empty_cart.png" alt="">
                            <p style="padding: 10px 0 16px 0; font-size: 17px; color: rgb(132, 135, 136);">Giỏ hàng chưa có sản phẩm nào</p>
                            <a class="path" href="san-pham/tat-ca-san-pham.html">Mua sắm ngay</a>
                        </div>
                        <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php

get_footer();
?>