<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$list_pages = db_fetch_array("SELECT pages.*, users.fullname 
FROM `pages` INNER JOIN `users` ON pages.user_id = users.user_id");

?>

<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách bài viết</h5>
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
            <div class="wp-table">
                <table class="table table-user table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Tên trang</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Nội dung trang</th>
                            <th scope="col">Người tạo</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>                      
                        <?php 
                        $temp = 0;                                                
                        foreach($list_pages as $page){                        
                            $temp++;
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td scope="row"><?php echo $temp ?></td>
                                <td><a href=""><?php echo $page['page_title'] ?></a></td>
                                <td><a href=""><?php echo $page['page_slug'] ?></a></td>
                                <td><a href=""><?php echo $page['page_content'] ?></a></td>
                                <td><a href=""><?php echo $page['fullname'] ?></a></td>
                                <td><?php echo $page['created_at'] ?></td>                     
                                <td><?php echo $page['updated_at'] ?></td>                     
                                <td><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                    <a onclick="return Del('<?php echo $page['page_title'] ?>')" href="?mod=pages&action=delete&id=<?php echo $page['page_id'] ?>" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>  
                            <?php
                        }
                        ?>                            
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">Trước</span>
                            <span class="sr-only">Sau</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script>
    function Del(name) {
        return confirm("Bạn có muốn xóa trang: " + name + " ?")
    }
</script>

<?php

get_footer();
?>