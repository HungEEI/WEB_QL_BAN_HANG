<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$product = get_list_order();
$total = get_total_price();
$grandTotal = 0;                           
foreach ($total as $g) {
$grandTotal += $g['total_amount'];
}
?>

<div id="wp-content">
    <div class="container-fluid py-5">
        <div class="row">                 
            <div class="col-3">
                <div class="card text-white bg-danger mb-3" style="max-width: 24rem;">
                    <div class="card-header">ĐANG CHỜ XỬ LÝ</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            echo count(get_status("pending"));
                            ?>
                        </h5>
                        <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-white bg-secondary mb-3" style="max-width: 24rem;">
                    <div class="card-header">ĐANG XỬ LÝ</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            echo count(get_status("processing"));
                            ?>
                        </h5>
                        <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-white bg-info mb-3" style="max-width: 24rem;">
                    <div class="card-header">ĐÃ VẬN CHUYỂN</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                                echo count(get_status("shipped"));
                            ?>
                        </h5>
                        <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-white bg-success mb-3" style="max-width: 24rem;">
                    <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                                echo count(get_status("delivered"));
                            ?>
                        </h5>
                        <p class="card-text">Đơn hàng giao dịch thành công</p>
                    </div>
                </div>
            </div>   
            <div class="col-3">
                <div class="card text-white bg-primary mb-3" style="max-width: 24rem;">
                    <div class="card-header">DOANH SỐ</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo formatCurrency($grandTotal) ?></h5>
                        <?php
                        function formatCurrency($amount) {
                            if ($amount >= 1000000000) {
                                // Tỷ
                                $formattedAmount = number_format($amount / 1000000000, 1) . ' tỷ';
                            } else {
                                // Triệu
                                $formattedAmount = number_format($amount / 1000000, 1) . ' triệu';
                            }

                            return $formattedAmount;
                        }
                        ?>

                        <p class="card-text">Doanh số hệ thống</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-white bg-dark mb-3" style="max-width: 24rem;">
                    <div class="card-header">ĐƠN HÀNG HỦY</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                                echo count(get_status("canceled"));
                            ?>
                        </h5>
                        <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-dark mb-3" style="max-width: 24rem;">
                    <div class="card-header">TỔNG SẢN PHẨM TRONG KHO</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                                echo get_total_qty();
                            ?>
                        </h5>
                        <p class="card-text">Số lượng sản phẩm trong kho</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end analytic  -->
        <div class="card">
            <div class="card-header font-weight-bold">
                ĐƠN HÀNG MỚI
            </div>
            <div class="card-body">            
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col-3">#</th>
                                <th scope="col-3">Mã đơn</th>
                                <th scope="col-3">Số lượng</th>
                                <th scope="col-3">Khách hàng</th>
                                <th scope="col-3">Thành tiền</th>
                                <th scope="col-3">Trạng thái</th>
                                <th scope="col-3">Ngày đặt hàng</th>
                                <th scope="col-3">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                         
                            $t = 0;
                            foreach($product as $p) {
                                $t++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $t ?></th>
                                    <td><?php echo $p['order_code'] ?></td>
                                    <td><?php echo $p['product_quantity'] ?></td>
                                    <td>                                       
                                        <a class="a_blue" href="?mod=orders&controller=index&action=detail&id=<?php echo $p['order_id'] ?>">
                                            <?php echo $p['fullname'] ?><br>
                                        </a>
                                        <a class="a_blue" href="?mod=orders&controller=index&action=detail&id=<?php echo $p['order_id'] ?>">
                                            0<?php echo $p['phone'] ?>
                                        </a>
                                    </td>
                                    <td><?php echo currency_format($p['total_amount']) ?></td>
                                    <td>
                                    <?php
                                        switch ($p['status']) {
                                            case 'pending':
                                                ?>
                                                <span class="badge bg-danger text-white">
                                                    Đang chờ xử lý
                                                </span>
                                                <?php
                                                break;
                                            case 'processing':
                                                ?>
                                                <span class="badge badge-warning">
                                                    Đang xử lý
                                                </span>
                                                <?php
                                                break;
                                            case 'shipped':
                                                ?>
                                                <span class="badge bg-success text-white">
                                                    Đã vận chuyển
                                                </span>
                                                <?php
                                                break;
                                            case 'delivered':
                                                ?>
                                                <span class="badge bg-primary text-white">
                                                    Đã giao hàng
                                                </span>
                                                <?php
                                                break;
                                            case 'canceled':
                                                ?>
                                                <span class='badge bg-dark text-white'>
                                                    Đã hủy
                                                </span>
                                              
                                                <?php
                                                break;
                                            default:                                      
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $p['order_date'] ?></td>
                                    <td>                                      
                                        <a onclick="return Del('<?php echo $p['order_code'] ?>')" href="?mod=home&controller=index&action=delete&id=<?php echo $p['order_id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>                     
                        </tbody>
                    </table>           
            </div>
        </div>
    </div>
</div>

<script>
function Del(name) {
    return confirm("Bạn chắc chắn xóa đơn hàng: " + name + " ?")
}
</script>

<?php
get_footer();
?>