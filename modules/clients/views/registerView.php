<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://unitop.vn.test:86/PHP/Project/ismart.com/" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="public/client.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Đăng ký</title>
</head>

<body>
<div class="container active" id="container">
    <a href="trang-chu.html" class="btn-home-re icon"><i class="fa-solid fa-house"></i></a>
    <div class="form-container sign-up">
        <form method="POST">
            <h1>Tạo tài khoản</h1>
            <div class="social-icons">
                <a href="https://www.google.com.vn/" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="https://www.facebook.com/tote.hung.5/" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>hoặc sử dụng email để đăng ký</span>
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="fullname" placeholder="Fullname">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Mật khẩu">
            <button name="btn-reg">Đăng ký</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Xin chào!</h1>
                <p>Bạn đã là thành viên!</p><br>
                <p>Hãy đăng nhập để cùng nhau khám phá ngay</p>
                <a href="chuc-nang/dang-nhap.html"><button class="hidden" id="login">Đăng nhập</button></a>
            </div>
        </div>
    </div>
</div>


</body>

</html>