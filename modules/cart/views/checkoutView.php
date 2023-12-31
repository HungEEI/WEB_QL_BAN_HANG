<?php
get_header();
?>

<?php
$num_order = get_num_oder_cart();
?>

<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="trang-chu.html" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="thanh-toan/don-mua.html" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php 
        if($num_order > 0) {
            ?>
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">
                    <form method="POST" action="?mod=cart&controller=checkout&action=order" name="form-checkout">
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="fullname">Họ tên</label>
                                <input type="text" name="fullname" id="fullname">
                                <?php echo form_error('fullname'); ?>
                            </div>
                            <div class="form-col fl-right">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address">
                                <?php echo form_error('address'); ?>
                            </div>
                            <div class="form-col fl-right">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" name="phone" id="phone">
                                <?php echo form_error('phone'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">
                                <label for="notes">Ghi chú</label>
                                <textarea name="note"></textarea>
                            </div>
                        </div>
                        <div id="payment-checkout-wp">
                            <ul id="payment_methods">
                                <li>
                                    <input type="radio" id="direct-payment" name="payment" value="online">
                                    <label for="payment-home">Thanh toán online</label>
                                </li>
                                <li>
                                    <input type="radio" id="payment-home" name="payment" value="cod">
                                    <label for="cod">Thanh toán khi nhận hàng</label>
                                </li>
                                <?php echo form_error('payment') ?>
                            </ul>
                            <div class="place-order-wp clearfix">
                                <input type="submit" id="order-now" name="btn-order" value="Đặt hàng">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Ảnh</td>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                                foreach(get_list_by_cart() as $item) {
                                    ?>
                                    <tr class="cart-item">
                                        <td><img style="width: 94px;" src="admin/<?php echo $item['image_url'] ?>" alt=""></td>
                                        <td class="product-name"><?php echo $item['product_name'] ?><strong class="product-quantity">x <?php echo $item['qty'] ?></strong></td>
                                        <td class="product-total"><?php echo currency_format($item['product_total_money']) ?></td>
                                    </tr>
                                    <?php
                                }
                            
                        ?>
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td colspan="2">Tổng đơn hàng:</td>
                                <td><strong class="total-price"><?php echo currency_format(get_total_cart()) ?></strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <?php echo form_error('order') ?>
                </div>
                </div>
            </div>
            <?php
        }else {
            ?>
            <div style="text-align: center;">
                <img style="display: block; margin: 0 auto; width: 26%" src="public/images/empty_cart.png" alt="">
                <p style="padding: 10px 0 16px 0; font-size: 17px; color: rgb(132, 135, 136);">Không có sản phẩm để thanh toán</p>
                <a class="path" href="san-pham/tat-ca-san-pham.html">Mua sắm ngay</a>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php
get_footer();
?>