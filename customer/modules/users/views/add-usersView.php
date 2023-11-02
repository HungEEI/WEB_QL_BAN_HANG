<?php
get_header();
?>
<?php
get_sidebar();
?>

<div id="wp-content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm người dùng
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="fullname">Họ và tên</label>
                    <input class="form-control" type="text" name="fullname" id="name">
                    <?php echo form_error('fullname'); ?>
                </div>
                <div class="form-group">
                    <label for="ussername">Tên đăng nhập</label>
                    <input class="form-control" type="text" name="username" id="name">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="password">
                    <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                    <?php echo form_error('email'); ?>                    
                </div>             

                <button type="submit" class="btn btn-primary" name="btn-add">Thêm mới</button>
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
?>