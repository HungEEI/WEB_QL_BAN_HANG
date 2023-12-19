<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$detail = get_order_detail_by_id();
?>

<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-ds-center">
            <h5 class="m-0 ">Thông tin đơn hàng</h5>        
        </div>
        <div class="card-body">                
            <p><strong>Mã đơn hàng: </strong><?php echo $detail[0]['order_code'] ?></p><br>
            <p><strong>Email: </strong><?php echo $detail[0]['customer']['email'] ?></p><br>
            <p><strong>Địa chỉ nhận hàng: </strong><?php echo $detail[0]['shipping_address'] ?></p><br>
            <p><strong>Yêu cầu vận chuyển: </strong><?php echo $detail[0]['note'] ?></p><br>
            <p><strong>Tình trạng đơn hàng: </strong> <?php
                                            switch ($detail[0]['status']) {
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
                                                    <span class="badge bg-primary text-white">
                                                        Đã vận chuyển
                                                    </span>
                                                    <?php
                                                    break;
                                                case 'delivered':
                                                    ?>
                                                    <span class="badge bg-success text-white">
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
                                            ?></p>
            <form enctype="multipart/form-data" action="?mod=orders&cotroller=index&action=update&id=<?php echo $detail[0]['order_id'] ?>" method="POST">
                <div class="form-action form-inline py-3">
                    <select class="p-2 mr-3" name="status">
                        <?php
                        $status_mapping = [
                            'pending' => 'Đang chờ xử lý',
                            'processing' => 'Đang xử lý',
                            'shipped' => 'Đã vận chuyển',
                            'delivered' => 'Đã giao hàng',
                            'canceled' => 'Đã hủy'
                        ];

                        $status_top = $detail[0]['status'];
                        $statusText = $status_mapping[$status_top];
                        ?>
                        <option value="<?php echo $status_top ?>"><?php echo $statusText ?></option>
                        <?php
                        $enum = ['pending', 'processing', 'shipped', 'delivered', 'canceled'];
                        foreach ($enum as $e) {
                            if ($e !== $status_top) {
                                ?>
                                <option value="<?php echo $e ?>"><?php echo $status_mapping[$e] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                    <input type="submit" name="btn-status" class="btn btn-primary" value="Áp dụng" >
                </div>               
            </form>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>                         
                            <th scope="col">#</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        unset($temp);
                        $temp = 0;
                        foreach($detail as $d) {
                            $temp++;
                            ?>
                            <tr>                           
                                <td><?php echo $temp ?></td>
                                <td><?php echo $d['product_code'] ?></td>
                                <td>                               
                                    <img class="img-product" src="../admin/<?php echo $d['thumb']['image_url'] ?>" alt="">
                                </td>
                                <td><?php echo $d['product_name'] ?></td>
                                <td><?php echo currency_format($d['price']) ?></td>
                                <td><?php echo $d['quantity'] ?></td>
                                <td><?php echo currency_format($d['price'] * $d['quantity']) ?></td>  
                            </tr>
                            <?php
                        }                      
                        ?>
                        <tr>
                            <td colspan="2" style="text-align: right; font-weight: 700; color: red; padding-right: 10px; border-right: 1px solid #ccc">
                            Tổng số lượng <br>
                            Tổng đơn hàng
                        </td>
                            <td colspan="5" style="font-weight: 600; color: #3005dd">
                            <?php echo $d['product_quantity'] ?><br>
                            <?php echo currency_format($d['total_amount']) ?>
                        </td>
                        </tr>
                    </tbody>
                </table>       
        </div>
    </div>
</div>

<?php
get_footer();
?>