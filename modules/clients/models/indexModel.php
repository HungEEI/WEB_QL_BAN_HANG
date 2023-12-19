<?php 

# Kiểm tra đăng nhập
function check_login($username, $password) {
    $check_user = db_num_rows("SELECT * FROM `users` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    if($check_user > 0)
        return true;
    return false;
}