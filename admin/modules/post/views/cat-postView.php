<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$list_cat = db_fetch_array("SELECT post_categories.*, users.fullname, post_categories.category_name, post_categories.category_slug
FROM post_categories 
INNER JOIN users ON post_categories.user_id = users.user_id;");

$result = data_tree($list_cat);
?>

<div id="wp-content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh mục bài viết
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="cat-title" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input class="form-control" type="text" name="cat-slug" id="name">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục cha</label>
                            <select name="parent_id" class="form-control">
                                <option>Chọn danh mục</option>
                                <?php
                                foreach($result as $cat) {
                                    if($cat['post_category_id']) {
                                        ?>                             
                                        <option value="<?php echo $cat['post_category_id'] ?>"><?php echo str_repeat('|--- ', $cat['level']).$cat['category_name'] ?></option>
                                        <?php
                                    }
                                }                             
                                ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Chờ duyệt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Công khai
                                </label>
                            </div>
                        </div> -->

                        <button type="submit" name="btn-add-cat" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh mục
                </div>
                <div class="card-body">
                    <div class="wp-table">
                        <table class="table table-user table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Người tạo</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $temp = 0;  
                                foreach($result as $cat) {
                                    $temp++;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $temp ?></th>
                                        <td>
                                            <?php 
                                            echo str_repeat('|--- ',$cat['level']).$cat['category_name']
                                            ?>
                                        </td>
                                        <td><?php echo $cat['fullname'] ?></td>
                                        <td><?php echo $cat['category_slug'] ?></td>  
                                        <td><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                        <a onclick="return Del('<?php echo $cat['category_name'] ?>')" href="?mod=post&controller=cat&action=delete&id=<?php echo $cat['post_category_id'] ?>" 
                                        class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
    </div>
</div>
<script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa: " + name + " ?");
    }
</script>

<?php
get_footer();
?>