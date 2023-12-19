<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://unitop.vn.test:86/PHP/Project/ismart.com/" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="public/client.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Đăng nhập</title>
</head>

<body>
<div class="container" id="container">
    <a class="btn-home icon" href="trang-chu.html"><i class="fa-solid fa-house"></i></a>
    <div class="form-container sign-in">
        <form action="" method="POST">
            <h1>Đăng nhập</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
                <span>hoặc sử dụng tài khoản của bạn</span>
                <input type="text" name="username" placeholder="Username" value="">
                <input type="password" name="password" placeholder="Mật khẩu"  value="">
                <div id="remember">
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Ghi nhớ đăng nhập</label>
            </div>
            <a href="quen-mat-khau">Quên mật khẩu?</a>
            <button type="submit" name="btn-login">Đăng nhập</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-right">
                <h1>Chào bạn!</h1>
                <p>Hãy đăng ký là thành viên để tận hưởng dịch vụ của chúng tôi</p>
                <a href="chuc-nang/dang-ky.html"><button class="hidden" id="register">Đăng ký</button></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>