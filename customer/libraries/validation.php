<?php

# Kiểm tra tên đăng nhập
function is_username($username) {
    $partten = "/^[A-Za-z0-9_\.]{3,32}$/";
    if(!preg_match($partten, $username, $matchs))
        return false;
    return true;
}

# Kiểm tra mật khẩu
function is_password($password) {
    $partten = "/^([\w_\.!@#$%^&*()]+){5,32}$/";
    if(!preg_match($partten, $password, $matchs))
        return false;
    return true;
}

# Kiểm tra email
function is_email($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        return false;
    return true;
}

# Thông báo lỗi
function form_error($label_field) {
    global $error;
    if(!empty($error[$label_field])) return "<p class='error'>{$error[$label_field]}</p>";      
}

# Hiển thị đã nhập
function set_value($label_field) {
    global $$label_field;
    if(!empty($$label_field)) return $$label_field;
}
