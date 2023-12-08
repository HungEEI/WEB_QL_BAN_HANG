<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$list_cat = db_fetch_array("SELECT * FROM `product_categories`");
$result = data_tree($list_cat);
$product = get_product_by_id();
?>
<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Cập nhật sản phẩm
        </div>
        <?php
        ?>
        <div class="card-body">
            <form id="upload_multi" action="" enctype="multipart/form-data" method="POST">
                <div class="row"> 
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Mã sản phẩm</label>
                            <input class="form-control" type="text" name="product-code" id="name" value="<?php echo $product['product_code'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="product-name" id="name" value="<?php echo $product['product_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input class="form-control" type="text" name="product-slug" id="name" value="<?php echo $product['product_slug'] ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Số lượng kho</label>
                            <input class="form-control" type="number" name="product-qty" id="name" value="<?php echo $product['stock_quantity'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Giá</label>
                            <input class="form-control" type="number" name="product-price" id="name" value="<?php echo $product['product_price'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Giá khuyến mại</label>
                            <input class="form-control" type="number" name="product-discount" id="name" value="<?php echo $product['product_discount'] ?>">
                        </div>                     
                    </div>                
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="intro">Mô tả sản phẩm</label>
                        <textarea name="product-desc" class="ckeditor" id="content"></textarea>
                        <script>
                            var productDesc = <?php echo json_encode($product['product_desc']); ?>;
                            document.getElementById('content').value = productDesc;
                        </script>              
                    </div> 
                    <div class="form-group col-6">
                        <label for="intro">Chi tiết sản phẩm</label>
                        <textarea name="product-detail" class="ckeditor" id="content-detail"></textarea>
                        <script>
                            var productDetail = <?php echo json_encode($product['product_detail']); ?>;
                            document.getElementById('content-detail').value = productDetail;
                        </script>   
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="sl-cat">
                        <option>Chọn danh mục</option>  
                        <?php
                        foreach ($result as $cat) {
                            ?>
                            <option value="<?php echo $cat['product_category_id'] ?>" <?php echo ($cat['product_category_id'] == $product['product_category_id']) ? 'selected' : ''; ?>>
                                <?php echo str_repeat('|--- ', $cat['level']).$cat['category_name'] ?>
                            </option>
                            <?php
                        }
                        ?> 
                    </select>
                </div>
                <div class="form-group d-fl">
                    <input type="checkbox" name="is-featured" <?php echo ($product['is_featured'] == 1) ? 'checked' : ''; ?>>
                    <label for="is-featured">Sản phẩm nổi bật</label>
                </div>
           
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="active" <?php echo ($product['status'] == 'active') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="exampleRadios1">
                            Công khai
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="inactive" <?php echo ($product['status'] == 'inactive') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="exampleRadios2">
                            Chờ duyệt
                        </label>
                    </div>
                </div>
                <div class="form-group mg-bt clearfix"> 
                    <label for="detail">Hình ảnh</label><br>
                    <input type="file" name="images[]" id="file" multiple="" data-uri="?mod=image&controller=upload&action=multiUpload">
                    <input type="submit" id="upload_multi_bt" name="bt_upload" value="Uploads">    
                    <input type ="hidden" name="image_id" id="thumbnail_url" value="" />
                </div>
                <div id="result"></div>
                <button type="submit" class="btn btn-primary" name="btn-update-product">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
<?php
get_footer();
?>

