<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$list_post = get_info_list_post();

$num_row = count($list_post);
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
            <h5 class="m-0 ">Danh sách bài viết</h5>
            <div class="form-search form-inline">
                <form action="?mod=post&controller=index&action=search" method="GET">
                    <input type="" class="form-control form-search" name="search" placeholder="Tìm kiếm" required value="<?php if(isset($_GET['search'])) echo $_GET['search'] ?>">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    <input type="hidden" name="mod" value="post">
                    <input type="hidden" name="controller" value="index">
                    <input type="hidden" name="action" value="search">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Công khai<span class="text-muted">(<?php echo count(get_status_post('active')) ?>)</span></a>
                <a href="" class="text-primary">Chờ duyệt<span class="text-muted">(<?php echo count(get_status_post('inactive')) ?>)</span></a>             
            </div>
            <form action="" method="GET">
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Công khai</option>
                        <option>Chờ duyệt</option>
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
                                <th scope="col">Tiêu đề</th>
                                <!-- <th scope="col">Slug</th> -->
                                <th scope="col">Danh mục</th>
                                <!-- <th scope="col">Mô tả ngắn</th> -->
                                <!-- <th scope="col">Nội dung</th> -->
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người tạo</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $temp = 0;
                            $num = isset($num) ? $num : 0;
                            if($num > 0){
                                foreach($results as $post){
                                    $temp++;
                                    ?>         
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td scope="row"><?php echo $temp ?></td>
                                        <td><img class="img-post" src="../admin/<?php echo $post['image_url'] ?>"></td>
                                        <td><a href=""><?php echo $post['post_title'] ?></a></td>
                                        <!-- <td><?php echo $post['post_slug'] ?></td> -->
                                        <td><?php echo $post['category_name'] ?></td>
                                        <!-- <td><?php echo $post['post_except'] ?></td> -->
                                        <!-- <td><?php echo $post['post_content'] ?></td> -->
                                        <?php
                                        if($post['status'] == 'active') {
                                            ?>
                                            <td><span class="badge badge-success">Công khai</span></td>
                                            <?php
                                        }else {
                                            ?>
                                            <td><span class="badge badge-warning">Chờ duyệt</span></td>
                                            <?php
                                        }
                                        ?>
                                        <td><?php echo $post['fullname'] ?></td></td>
                                        <td><?php echo $post['created_at'] ?></td>
                                        <td>
                                            <a href="?mod=post&controller=index&action=update&id=<?php echo $post['post_id'] ?>" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a onclick="return Del('<?php echo $post['post_title'] ?>')" href="?mod=post&controller=index&action=delete&id=<?php echo $post['post_id'] ?>" class="btn btn-danger btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else {
                                for($i = $start; $i < min($start + $num_per_page, $num_row); $i++){
                                    $post = get_info_list_post($i); 
                                    $temp++;
                                    ?>         
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td scope="row"><?php echo $temp ?></td>
                                        <td><img class="img-post" src="<?php echo $post[$i]['image_url'] ?>" alt=""></td>
                                        <td><a href=""><?php echo $post[$i]['post_title'] ?></a></td>
                                        <!-- <td><?php echo $post[$i]['post_slug'] ?></td> -->
                                        <td><?php echo $post[$i]['category_name'] ?></td>
                                        <!-- <td><?php echo $post[$i]['post_except'] ?></td> -->
                                        <!-- <td><?php echo $post[$i]['post_content'] ?></td> -->
                                        <?php
                                        if($post[$i]['status'] == 'active') {
                                            ?>
                                            <td><span class="badge badge-success">Công khai</span></td>
                                            <?php
                                        }else {
                                            ?>
                                            <td><span class="badge badge-warning">Chờ duyệt</span></td>
                                            <?php
                                        }
                                         ?>
                                        <td><?php echo $post[$i]['fullname'] ?></td></td>
                                        <td><?php echo $post[$i]['created_at'] ?></td>
                                        <td>
                                            <a href="?mod=post&controller=index&action=update&id=<?php echo $post[$i]['post_id'] ?>" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a onclick="return Del('<?php echo $post[$i]['post_title'] ?>')" href="?mod=post&controller=index&action=delete&id=<?php echo $post[$i]['post_id'] ?>" class="btn btn-danger btn-sm rounded-0" type="button"
                                             data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>                       
                        </tbody>
                    </table>
            </form>
                <?php 
                if($num ==0) {
                    if($num_page >= 2) {
                        echo get_pugging($num_page, $page, $base_url = "?mod=post&controller=index&action=list");
                    }
                }
                ?>
        </div>
    </div>
</div>

<script>
function Del(name) {
    Del("Bạn chắc chắn muốn xóa bài viết: " + name + " ?")
}
</script>

<?php

get_footer();
?>