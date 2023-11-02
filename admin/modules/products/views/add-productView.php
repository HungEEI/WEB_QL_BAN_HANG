<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$list_cat = db_fetch_array("SELECT * FROM `product_categories`");
$result = data_tree($list_cat);
?>
<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        <div class="card-body">
            <form id="upload_multi" action="" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Mã sản phẩm</label>
                            <input class="form-control" type="text" name="product-code" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="product-name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input class="form-control" type="text" name="product-slug" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Giá</label>
                            <input class="form-control" type="text" name="product-price" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Giá khuyến mại</label>
                            <input class="form-control" type="text" name="product-discount" id="name">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục</label>
                            <select class="form-control" id="" name="sl-cat">
                                <option>Chọn danh mục</option>  
                                <?php
                                foreach($result as $cat) {
                                    ?>
                                    <option value="<?php echo $cat['product_category_id'] ?>"><?php echo str_repeat('|--- ', $cat['level']).$cat['category_name'] ?></option>                              
                                    <?php
                                }
                                ?> 
                            </select>
                        </div>
                    </div>                  
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro">Mô tả sản phẩm</label>
                            <textarea name="product-desc" class="ckeditor" id="content"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="intro">Chi tiết sản phẩm</label>
                    <textarea name="product-detail" class="ckeditor" id="content"></textarea>
                </div>
           
                <!-- <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Còn hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Hết hàng
                        </label>
                    </div>
                </div> -->
                <div class="form-group clearfix"> 
                    <label for="detail">Hình ảnh</label><br>
                    <input type="file" name="images[]" id="file" multiple="" data-uri="?mod=image&controller=upload&action=multiUpload">
                    <input type="submit" id="upload_multi_bt" name="bt_upload" value="Uploads">    
                    <input type ="hidden" name="image_id" id="thumbnail_url" value="" />
                </div>
                <div id="result"></div>
                <button type="submit" class="btn btn-primary" name="btn-add-product">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
<?php
get_footer();
?>