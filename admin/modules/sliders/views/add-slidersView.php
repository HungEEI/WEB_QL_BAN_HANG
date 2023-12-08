<?php
get_header();
?>
<?php
get_sidebar();
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
                     <input class="form-control" type="text" name="slider-name" id="name">
                </div>
                <div class="form-group">
                    <label for="page_slug">Slug</label>
                    <input class="form-control" type="text" name="slider-slug" id="name">
                </div>                                                    
                <div class="form-group clearfix">                 
                    <label for="detail">Hình ảnh</label><br>
                    <input type="file" name="file" id="file" data-uri="?mod=image&controller=upload&action=upload">
                    <input type="submit" name="Upload" value="Upload" id="upload_single_bt">
                    <input type ="hidden" name="image_id" id="thumbnail_url" value="" />
                    <div id="show_list_file" >
                </div>
                <button type="submit" name="btn-add-slider" class="btn btn-add btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>

<?php

get_footer();
?>