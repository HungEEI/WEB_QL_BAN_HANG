<?php
get_header();
?>
<?php
get_sidebar();
?>

<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Đổi mật khẩu
        </div>
        <div class="card-body">
            <form method="POST">             
                <div class="form-group">
                    <label for="ussername">Tên đăng nhập</label>
                    <input class="form-control" type="text" name="username" id="name">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu cũ</label>
                    <input class="form-control" type="password" name="password" id="password">
                    <?php echo form_error('password'); ?>
                </div>  
                <div class="form-group">
                    <label for="password">Mật khẩu mới</label>
                    <input class="form-control" type="password" name="password" id="password">
                    <?php echo form_error('password'); ?>
                </div>                          
                <button type="submit" class="btn btn-primary" name="btn-add">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
?>