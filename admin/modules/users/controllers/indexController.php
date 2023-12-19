<?php

function construct()
{
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');
    load('helper', 'pagging');
}

function listAction() {
    load_view('list-users');
}

function newAction() {
    load_view('newPass');
}

function addAction() {
    global $error, $fullname, $username, $password, $email;
    if(isset($_POST['btn-add'])) {
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
        $level = isset($_POST['level']) ? $_POST['level'] : 'admin';
        if(empty($error)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data = [
                'fullname' => $fullname,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'level' => $level,
                'created_at' => date('Y-m-d H:i:s')
            ];
            db_insert('users', $data);
        }
    }
    load_view('add-users');
}

function loginAction()
{
    global $error, $username, $password;
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

        $level = db_fetch_row("SELECT users.level FROM `users` WHERE users.username = '{$username}'");
        # Kết luận
        if (empty($error)) {
            if($level['level'] == 'admin') {
                if (check_login($username, $password)) {
                    // Lưu trữ phiên đăng nhập
                    $_SESSION['is_login'] = true;
                    $_SESSION['user_login'] = $username;
                    // Chuyển hướng vào trong hệ thống
                    redirect();
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

# Thoát và xóa phiên đăng nhập
function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
}

// Đổi mật khẩu
function resetAction()
{
    if (isset($_POST['btn-changePass'])) {
        global $error, $current_pass, $new_pass, $confirm_pass;
        $error = array();

        $check_password = get_user_by_username($_SESSION['user_login']);

        # Mật khẩu hiện tại
        if(empty($_POST['pass-old'])){
            $error['pass-old'] = "Vui lòng nhập mật khẩu cũ";
        }else{ 
            if(!is_password($_POST['pass-old'])){
                $error['pass-old'] = "Mật khẩu không đúng định dạng";
            }else{
                $current_pass = md5($_POST['pass-old']);
            }
        }

        # Mật khẩu cũ 
        if($check_password['password'] != $current_pass){
            $error['pass-old'] = "Mật khẩu cũ bạn nhập không đúng";
        }

        # Mật khẩu mới
        if(empty($_POST['pass-new'])){
            $error['pass-new'] = "Vui lòng nhập mật khẩu mới";
        }else{
            if(!is_password($_POST['pass-new'])){
                $error['pass-new'] = "Mật khẩu không đúng định dạng";
            }else{
                $new_pass = md5($_POST['pass-new']);
            }
        }

        # Xác nhận mật khẩu mới
        if(empty($_POST['confirm-pass'])){
            $error['confirm-pass'] = "Vui lòng xác nhận mật khẩu";
        }else{
            $confirm_pass = md5($_POST['confirm-pass']);
            if ($new_pass !== $confirm_pass) {
                $error['confirm-pass'] = "Mật khẩu mới và xác nhận mật khẩu không khớp";
            }
            if($new_pass == $check_password['password']){
                $error['duplicate_password'] = "Mật khẩu mới trùng với mật khẩu cũ";
            }
        }

        if(empty($error)){
            $data = [
                'password' => $new_pass
            ];
            change_pass($data,  $_SESSION['user_login']);
            $error['success'] = "Đã cập nhật thành công";
        }
    } 
    load_view('reset');
}

function resetOkAction()
{
    load_view('resetOk');
}

function updateAction() {
    $id = $_GET['id'];
    if (isset($_POST['btn-update'])) {
        global $error;
        $error = array();

        # Fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không để trống họ tên";
        } else {
            $fullname = $_POST['fullname'];
        }

         # Username
         if (empty($_POST['username'])) {
            $error['username'] = "Không để trống trên đăng nhập";
        } else {
            $username = $_POST['username'];
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

        # Email
        if (empty($_POST['email'])) {
            $error['email'] = "Hãy nhập email";
        } else {
            $email = $_POST['email'];
        }
        $level = isset($_POST['level']) ? $_POST['level'] : 'admin';
        if (empty($error)) {
            # Update
            $data = array(
                'fullname' => $fullname,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'level' => $level,
            );
            db_update('users', $data, "user_id = $id");
            redirect('?mod=users&action=list');
        }
    }
    load_view('update');
}

function deleteAction() {
    $id = $_GET['id'];
    db_delete("users", "`user_id` = $id");
    redirect("?mod=users&action=list");
}
