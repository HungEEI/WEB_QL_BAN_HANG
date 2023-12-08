<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$order = get_list_order();
$num_row = count(get_list_order());
// Số lượng bản ghi trên trang
$num_per_page = 4;
//Tổng số bản ghi
$total_row = $num_row;
// Tính tổng số trang   
$num_page = ceil($total_row / $num_per_page);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $num_per_page;
?>
<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Đang chờ xử lý<span class="text-muted">(<?php echo count(get_status('pending')) ?>)</span></a>
                <a href="" class="text-primary">Đang xử lý<span class="text-muted">(<?php echo count(get_status('processing')) ?>)</span></a>
                <a href="" class="text-primary">Đã vận chuyển<span class="text-muted">(<?php echo count(get_status('shipped')) ?>)</span></a>
                <a href="" class="text-primary">Đã giao hàng<span class="text-muted">(<?php echo count(get_status('delivered')) ?>)</span></a>
                <a href="" class="text-primary">Đã hủy<span class="text-muted">(<?php echo count(get_status('canceled')) ?>)</span></a>
            </div>          
                <table class="table table-striped table-checkall mt-4">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="checkall">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Mã</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // show_array($order);
                        $temp = 0;
                        for($i = $start; $i < min($start + $num_per_page, $num_row); $i++){
                            $item = get_list_order($i); 
                            $temp++;
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td><?php echo $temp ?></td>
                                <td><?php echo $item[$i]['order_code'] ?></td>
                                <td>
                                    <a class="a_blue" href="?mod=orders&controller=index&action=detail&id=<?php echo $item[$i]['order_id'] ?>">
                                        <?php echo $item[$i]['fullname'] ?><br>
                                        0<?php echo $item[$i]['phone'] ?>
                                    </a>
                                </td>
                                <td><?php echo currency_format($item[$i]['total_amount']) ?></td>
                                <td>
                                        <?php
                                        switch ($item[$i]['status']) {
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
                                <td><?php echo $item[$i]['order_date'] ?></td>
                                <td>                                  
                                    <a onclick="return Del('<?php echo $item[$i]['order_code'] ?>')" href="?mod=orders&controller=index&action=delete&id=<?php echo $item[$i]['order_id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php 
                if($num_page >= 2) {
                    echo get_pugging($num_page, $page, $base_url = "?mod=orders&controller=index&action=index");
                }
                ?>
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