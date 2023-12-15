<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$list_sliders = get_slider();

$num_row = count($list_sliders);
// Số lượng bản ghi trên trang
$num_per_page = 2;
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
            <h5 class="m-0 ">Danh sách sliders</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
            </div>
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
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên sliser</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Người tạo</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>                      
                        <?php 
                        $temp = 0;                                                
                        for($i = $start; $i < min($start + $num_per_page, $num_row); $i++){
                            $slider = get_slider($i);                            
                            $temp++;
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td scope="row"><?php echo $temp ?></td>
                                <td><a href=""><img class="img-post" src="../admin/<?php echo $slider[$i]['image_url'] ?>" alt=""></a></td>
                                <td><a href=""><?php echo $slider[$i]['slider_name'] ?></a></td>
                                <td><a href=""><?php echo $slider[$i]['slider_slug'] ?></a></td>
                                <td><a href=""><?php echo $slider[$i]['fullname'] ?></a></td>
                                <td><?php echo $slider[$i]['created_at'] ?></td>                     
                
                                <td><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                    <a onclick="return Del('<?php echo $slider[$i]['slider_name'] ?>')" href="?mod=sliders&controller=index&action=delete&id=<?php echo $slider[$i]['slider_id'] ?>" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>  
                            <?php
                        }
                        ?>                            
                    </tbody>
                </table>
            <?php 
            if($num_page >= 2) {
                echo get_pugging($num_page, $page, $base_url = "?mod=sliders&controller=index&action=list");
            }
            ?>
        </div>
    </div>
</div>

<script>
    function Del(name) {
        return confirm("Bạn có muốn xóa slider: " + name + " ?")
    }
</script>

<?php

get_footer();
?>