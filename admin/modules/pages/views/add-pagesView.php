<?php
get_header();
?>
<?php
get_sidebar();
?>
<div id="wp-content" class="container-fluid">
    <div class="card">
                        <div class="card-header font-weight-bold">
                            Thêm Trang
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="page_title">Tên trang</label>
                                    <input class="form-control" type="text" name="page-title" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="page_slug">Slug</label>
                                    <input class="form-control" type="text" name="page-slug" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="page_content">Nội dung trang</label>
                                    <textarea name="page-content" class="ckeditor" id="content" ></textarea>
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
                                <button type="submit" name="btn-add-page" class="btn btn-primary">Thêm mới</button>
                            </form>
                        </div>
                    </div>
</div>

<?php

get_footer();
?>