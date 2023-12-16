<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$list_users = get_list_users();
$num_row = count($list_users);
// Số lượng bản ghi trên trang
$num_per_page = 5;
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
            <h5 class="m-0 ">Danh sách thành viên</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">        
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="checkall">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <!-- <th scope="col">Password</th> -->
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $temp = 0;
                        for($i = $start; $i < min($start + $num_per_page, $num_row); $i++){
                            $user = get_list_users($i); 
                            $temp++;
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <th scope="row"><?php echo $temp ?></th>
                                <td><?php echo $user[$i]['fullname'] ?></td>
                                <td><?php echo $user[$i]['username'] ?></td>
                                <td><?php echo $user[$i]['email'] ?></td>
                                <!-- <td><?php echo $user[$i]['password'] ?></td> -->
                                <td><?php echo $user[$i]['created_at'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a onclick="return Del('<?php echo $user[$i]['username'] ?>')"  href="?mod=users&action=delete&id=<?php echo $user[$i]['user_id']?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>               
                    </tbody>
                </table>
            <?php 
            if($num_page >= 2) {
                echo get_pugging($num_page, $page, $base_url = "?mod=users&controller=index&action=list");
            }
            ?>
        </div>
    </div>
</div>

<script>
    function Del(name) {
        return confirm("Bạn chắc chắn muốn xóa tài khoản: "+ name + " ?");
    }
</script>

<?php
get_footer();
?>