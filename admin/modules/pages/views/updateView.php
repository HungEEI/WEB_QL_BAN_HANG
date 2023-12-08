<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$page = get_page_by_id();
?>
<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Cập nhật trang
        </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="page_title">Tên trang</label>
                        <input class="form-control" type="text" name="page-title" id="name" value="<?php echo $page['page_title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="page_slug">Slug</label>
                        <input class="form-control" type="text" name="page-slug" id="name" value="<?php echo $page['page_slug'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="page_content">Nội dung trang</label>
                        <textarea name="page-content" class="ckeditor" id="content" ></textarea>
                        <script>
                            var pageContent = <?php echo json_encode($page['page_content']); ?>;
                            document.getElementById('content').value = pageContent;
                        </script>   
                    </div>                           
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="active" <?php echo ($page['status'] == 'active') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="exampleRadios1">
                                Công khai
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="inactive" <?php echo ($page['status'] == 'inactive') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="exampleRadios2">
                                Chờ duyệt
                            </label>
                        </div>
                    </div>
                    <button type="submit" name="btn-update-page" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
</div>

<?php

get_footer();
?>