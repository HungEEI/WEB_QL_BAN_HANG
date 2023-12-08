<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$list_cat = db_fetch_array("SELECT * FROM `post_categories`");
$result = data_tree($list_cat);
$post = get_post_by_id();
?>

<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Cập nhật bài viết
        </div>
        <div class="card-body">
            <form id="form-upload-single" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="post-title">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" name="post-title" id="name" value="<?php echo $post['post_title'] ?>">                                                          
                </div>
                <div class="form-group">
                    <label for="post_slug">Slug</label>
                    <input class="form-control" type="text" name="post-slug" id="name" value="<?php echo $post['post_slug'] ?>">
                </div>              
                <div class="form-group">
                    <label for="post_except">Mô tả ngắn</label>
                    <textarea name="post-except" class="ckeditor" id="except"></textarea>
                    <script>
                        var productDesc = <?php echo json_encode($post['post_except']); ?>;
                        document.getElementById('except').value = productDesc;
                    </script>  
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="post-content" class="ckeditor" id="content"></textarea>
                    <script>
                        var productDesc = <?php echo json_encode($post['post_content']); ?>;
                        document.getElementById('content').value = productDesc;
                    </script>  
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="sl-cat">
                        <option>Chọn danh mục</option>  
                        <?php
                        foreach ($result as $cat) {
                            ?>
                            <option value="<?php echo $cat['post_category_id'] ?>" <?php echo ($cat['post_category_id'] == $post['post_category_id']) ? 'selected' : ''; ?>>
                                <?php echo str_repeat('|--- ', $cat['level']).$cat['category_name'] ?>
                            </option>
                            <?php
                        }
                        ?> 
                    </select>                 
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="active" <?php echo ($post['status'] == 'active') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="exampleRadios1">
                            Công khai
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="inactive" <?php echo ($post['status'] == 'inactive') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="exampleRadios2">
                            Chờ duyệt
                        </label>
                    </div>
                </div>
                <div class="form-group clearfix">                 
                    <label for="detail">Hình ảnh</label><br>
                    <input type="file" name="file" id="file" data-uri="?mod=image&controller=upload&action=upload">
                    <input type="submit" name="Upload" value="Upload" id="upload_single_bt">
                    <input type ="hidden" name="image_id" id="thumbnail_url" value="" />
                    <div id="show_list_file" >
                </div>
                <button type="submit" name="btn-update" class="btn btn-add btn-primary">Cập nhật</button>             
            </form>            
        </div>
    </div>
</div>

<?php

get_footer();
?>