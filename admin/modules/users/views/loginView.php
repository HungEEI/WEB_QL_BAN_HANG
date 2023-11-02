<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="public/css/login.css">
  <title>Trang đăng nhập</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form id="form-login" method="POST">
                    <h2>Đăng nhập</h2>
                    <div class="inputbox">
                        <i class="fa-regular fa-user"></i>
                        <input type="username" id="username" name="username">
                        <label for="username">Tên đăng nhập</label>
                    </div>
                    <?php echo form_error('username'); ?>
                    <div class="inputbox">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password">
                        <label for="password">Mật khẩu</label>
                    </div>
                    <?php echo form_error('password'); ?>
                    <input type="submit" id="btn-login" name="btn-login" value="Đăng nhập">
                    <?php echo form_error('account'); ?>
                </form>
            </div>
        </div>
    </section>
</body>
</html>