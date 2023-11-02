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
                                <!-- <div class="form-group">
                                    <label for="">Trạng thái</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                          Bản nháp
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                          Công khai
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" checked>
                                        <label class="form-check-label" for="exampleRadios3">
                                          Chờ xử lý
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4">
                                        <label class="form-check-label" for="exampleRadios4">
                                          Lưu trữ
                                        </label>
                                    </div>
                                </div> -->

                                <button type="submit" name="btn-add-page" class="btn btn-primary">Thêm mới</button>
                            </form>
                        </div>
                    </div>
</div>

<?php

get_footer();
?>