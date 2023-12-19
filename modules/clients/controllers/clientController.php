<?php
function construct() {
    load_model('index');
}

function loginAction() {
    global $error;
    if (isset($_POST['btn-login'])) {
        $error = array();
        # Username
        if (empty($_POST['username'])) {
            $error['username'] = "Không để trống tên đăng nhập";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Mật khẩu không đúng định dạng";
            } else {
                $username = $_POST['username'];
            }
        }
        # Password
        if (empty($_POST['password'])) {
            $error['password'] = "Không để trống mật khẩu";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng";
            } else {
                $password = md5($_POST['password']);
            }
        }
        if(isset($username)) {
            $level = db_fetch_row("SELECT users.level FROM `users` WHERE users.username = '{$username}'");
        }
        # Kết luận
        if (empty($error)) {
            if($level['level'] == 'client' || $level['level'] == 'admin') {
                if (check_login($username, $password)) {
                    // Lưu trữ phiên đăng nhập
                    $_SESSION['is_login'] = true;
                    $_SESSION['user_login'] = $username;
                    // Chuyển hướng vào trong hệ thống
                    redirect('trang-chu.html');
                } else {
                    $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại";
                }
            }else {
                $error['account'] = "Không thể đăng nhập";
            }
        }
    }
    load_view('login');
}

function registerAction() {
    global $error, $fullname, $username, $password, $email;
    if(isset($_POST['btn-reg'])) {
        $error = array();

        # Fullname
        if(empty($_POST['fullname'])) {
            $error['fullname'] = "Hãy nhập họ và tên";
        }else {
            $fullname = $_POST['fullname'];
        }

        # Username
        if(empty($_POST['username'])) {
            $error['username'] = "Hãy nhập tên đăng nhập";
        }else {
            $username = $_POST['username'];
        }

        # Password
        if(empty($_POST['password'])) {
            $error['password'] = "Hãy tạo mật khẩu";
        }else {
            $password = md5($_POST['password']);
        }

        # Email
        if(empty($_POST['email'])) {
            $error['email'] = "Hãy nhập tên đăng nhập";
        }else {
            $email = $_POST['email'];
        }
        if(empty($error)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data = [
                'fullname' => $fullname,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'level' => 'client',
                'created_at' => date('Y-m-d H:i:s')
            ];
            db_insert('users', $data);
            redirect('chuc-nang/dang-nhap.html');
        }
    }
    load_view('register');
}