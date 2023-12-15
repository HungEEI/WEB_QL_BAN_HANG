<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$list_cat = db_fetch_array("SELECT * FROM `post_categories`");
$result = data_tree($list_cat);
?>

<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        <div class="card-body">
            <form id="form-upload-single" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="post-title">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" name="post-title" id="name">    
                    <?php echo form_error('post-title') ?>                                                      
                </div>
                <div class="form-group">
                    <label for="post_slug">Slug</label>
                    <input class="form-control" type="text" name="post-slug" id="name">
                    <?php echo form_error('post-slug') ?>
                </div>              
                <div class="form-group">
                    <label for="post_except">Mô tả ngắn</label>
                    <textarea name="post-except" class="ckeditor" id="content"></textarea>
                    <?php echo form_error('post-except') ?>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="post-content" class="ckeditor" id="content"></textarea>
                    <?php echo form_error('post-content') ?>
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="sl-cat">
                        <option>Chọn danh mục</option>  
                        <?php
                        foreach($result as $cat) {
                            ?>
                            <option value="<?php echo $cat['post_category_id'] ?>"><?php echo str_repeat('|--- ', $cat['level']).$cat['category_name'] ?></option>                              
                            <?php
                        }
                        ?> 
                    </select>     
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="active" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Công khai
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="inactive">
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
                    <?php echo form_error('image_id') ?>
                </div>
                <button type="submit" name="btn-add" class="btn btn-add btn-primary">Thêm mới</button>
            </form>            
        </div>
    </div>
</div>

<?php

get_footer();
?>