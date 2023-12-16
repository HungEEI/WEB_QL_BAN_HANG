<?php
get_header();
?>
<?php
get_sidebar();
?>
<?php 
$sliders = get_slider_by_id();
?>
<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm Sliders
        </div>
        <div class="card-body">
            <form id="form-upload-single" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="page_title">Tên slider</label>
                     <input class="form-control" type="text" name="slider-name" id="name" value="<?php echo $sliders['slider_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="page_slug">Slug</label>
                    <input class="form-control" type="text" name="slider-slug" id="name" value="<?php echo $sliders['slider_slug'] ?>">
                </div>      
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="active" <?php echo ($sliders['status'] == 'active') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="exampleRadios1">
                            Công khai
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="inactive" <?php echo ($sliders['status'] == 'inactive') ? 'checked' : ''; ?>>
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
                <button type="submit" name="btn-add-slider" class="btn btn-add btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>

<?php

get_footer();
?>