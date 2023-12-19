<?php
get_header();
?>
<?php
get_sidebar();
?>

<?php
$id = $_GET['id'];
$user = get_user_by_id($id);
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
                    <input class="form-control" type="text" name="fullname" id="name" value="<?php echo $user['fullname'] ?>">
                    <?php echo form_error('fullname'); ?>
                </div>
                <div class="form-group">
                    <label for="ussername">Tên đăng nhập</label>
                    <input class="form-control" type="text" name="username" id="name" value="<?php echo $user['username'] ?>">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="password" value="password">
                    <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo $user['email'] ?>">
                    <?php echo form_error('email'); ?>                    
                </div>             
                <div class="form-group">
                    <label for="">Cấp</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" value="admin" <?php echo ($user['level'] == 'admin') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="exampleRadios1">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" value="client" <?php echo ($user['level'] == 'client') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="exampleRadios2">
                            Client
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="btn-update">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
<?php
get_footer();
?>

