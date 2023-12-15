<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$num_row = count(get_info_list_product());
// Số lượng bản ghi trên trang
$num_per_page = 10;
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
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#">
                <form action="?mod=products&controller=index&action=search" method="GET">
                    <input type="" class="form-control form-search" name="search" placeholder="Tìm kiếm" required value="<?php if(isset($_GET['search'])) echo $_GET['search'] ?>">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    <input type="hidden" name="mod" value="products">
                    <input type="hidden" name="controller" value="index">
                    <input type="hidden" name="action" value="search">
                </form>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Công khai<span class="text-muted">(<?php echo count(get_status_product('active')) ?>)</span></a>
                <a href="" class="text-primary">Chờ duyệt<span class="text-muted">(<?php echo count(get_status_product('inactive')) ?>)</span></a>             
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Cập nhật</option>
                    <option>Xóa</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>                 
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Người tạo</th>
                        <th scope="col">Trạng thái</th>
                        <!-- <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày cập nhật</th> -->
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $temp = 0;
                    $num = isset($num) ? $num : 0;
                    if($num > 0){
                        foreach($results as $product){        
                            $temp++;             
                            ?>                      
                            <tr class="">                      
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td><?php echo $temp; ?></td>
                                <td>                            
                                    <img class="img-product" src="<?php echo $product['thumb'][0]['image_url']?>
                                    " alt="">
                                </td>
                                <td><a href="#"><?php echo $product['product_name'] ?></a></td>
                                <td><?php echo currency_format($product['product_price']) ?></td>
                                <td><?php echo $product['category_name'] ?></td>
                              
                                <?php
                                if($product['stock_quantity'] > 0) {
                                    ?>
                                    <td><span class="badge badge-success">Còn hàng</span></td>
                                    <?php
                                }else {
                                    ?>
                                    <td><span class="badge badge-dark">Hết hàng</span></td>
                                    <?php
                                }
                                ?>
                                <td><?php echo $product['fullname'] ?></td>
                                <?php
                                if($product['status'] == 'active') {
                                    ?>
                                    <td><span class="badge badge-success">Công khai</span></td>
                                    <?php
                                }else {
                                    ?>
                                    <td><span class="badge badge-warning">Chờ duyệt</span></td>
                                    <?php
                                }
                                ?>
                                <!-- <td><?php echo $product['created_at'] ?></td>
                                <td><?php echo $product['updated_at'] ?></td> -->
                                <td>
                                    <a href="?mod=products&controller=index&action=update&id=<?php echo $product['product_id'] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a onclick="return Del('<?php echo $product['product_name'] ?>')" href="?mod=products&controller=index&action=delete&id=<?php echo $product['product_id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>                 
                            <?php
                        }                  
                    }else {
                        for($i = $start; $i < min($start + $num_per_page, $num_row); $i++){
                            $product = get_info_list_product($i);          
                            $temp++;             
                            ?>                      
                            <tr class="">                      
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td><?php echo $temp; ?></td>
                                <td>                            
                                    <img class="img-product" src="<?php echo $product[$i]['thumb'][0]['image_url']?>
                                    " alt="">
                                </td>
                                <td><a href="#"><?php echo $product[$i]['product_name'] ?></a></td>
                                <td><?php echo currency_format($product[$i]['product_price']) ?></td>
                                <td><?php echo $product[$i]['category_name'] ?></td>
                              
                                <?php
                                if($product[$i]['stock_quantity'] > 0) {
                                    ?>
                                    <td><span class="badge badge-success">Còn hàng</span></td>
                                    <?php
                                }else {
                                    ?>
                                    <td><span class="badge badge-dark">Hết hàng</span></td>
                                    <?php
                                }
                                ?>
                                <td><?php echo $product[$i]['fullname'] ?></td>
                                <?php
                                if($product[$i]['status'] == 'active') {
                                    ?>
                                    <td><span class="badge badge-success">Công khai</span></td>
                                    <?php
                                }else {
                                    ?>
                                    <td><span class="badge badge-warning">Chờ duyệt</span></td>
                                    <?php
                                }
                                ?>
                                <!-- <td><?php echo $product[$i]['created_at'] ?></td>
                                <td><?php echo $product[$i]['updated_at'] ?></td> -->
                                <td>
                                    <a href="?mod=products&controller=index&action=update&id=<?php echo $product[$i]['product_id'] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a onclick="return Del('<?php echo $product[$i]['product_name'] ?>')" href="?mod=products&controller=index&action=delete&id=<?php echo $product[$i]['product_id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>                 
                            <?php
                        }
                    }
                    ?>
            </table>
            <?php 
            if($num ==0) {
                if($num_page >= 2) {
                    echo get_pugging($num_page, $page, $base_url = "?mod=products&controller=index&action=list");
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
function Del(name) {
    return confirm("Bạn chắc chắn muốn xóa sản phẩm: " + name + " ?")
}
</script>

<?php
get_footer();
?>