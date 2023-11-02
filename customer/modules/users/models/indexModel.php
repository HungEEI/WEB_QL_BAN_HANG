<?php

# Lấy tên đăng nhập
function get_user_by_username($username) {
    $item = db_fetch_row("SELECT * FROM `users` WHERE `username` = '{$username}'");
    if(!empty($item))
        return $item;
}

# Lấy tên đăng nhập
function get_user_by_fullname($fullname) {
    $item = db_fetch_row("SELECT * FROM `users` WHERE `fullname` = '{$fullname}'");
    if(!empty($item))
        return $item;
}

# update tên đăng nhập
function update_user_login($username, $data) {
    db_update('users', $data, "`username` = '{$username}'");
}

function change_pass($data, $user) {
    db_update('users', $data, "`username` = '{$user}'");
}

function update_pass($data, $reset_pass_token){
    db_update('users', $data, "`reset_pass_token` = '{$reset_pass_token}'");
}

function  check_reset_pass_token($reset_pass_token){
    $check = db_num_rows("SELECT * FROM `users` WHERE `reset_pass_token` = '{$reset_pass_token}'");
    if($check > 0)
        return true;
    return false; 
}

function update_reset_pass_token($data, $email){
    db_update('users', $data, "`email` = '{$email}'");
}

# Kiểm tra email có trên hệ thống hay không
function check_email($email){
    $check = db_num_rows("SELECT * FROM `users` WHERE `email` = '{$email}'");
    if($check > 0)
        return true;
    return false;
}

# Kiểm tra đăng nhập
function check_login($username, $password) {
    $check_user = db_num_rows("SELECT * FROM `users` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    if($check_user > 0)
        return true;
    return false;
}

# Thêm user
function add_user($data) {
    return db_insert('users', $data);
}

function user_exists($username, $email) {
    $check_user = db_num_rows("SELECT * FROM `users` WHERE `email` = '{$email}' OR `username` = '{$username}'");
    echo $check_user;
    if(($check_user > 0))
        return true;
    return false;
}

# Lấy danh sách user
function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `users`");
    return $result;
}

# Lấy user theo id
function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `users` WHERE `user_id` = {$id}");
    return $item;
}

function active_user($active_token) {
    return db_update('users', array('is_active' => 1), "`active_token` = '{$active_token}'");
}

function check_active_token($active_token) {
    $check = db_num_rows("SELECT * FROM `users` WHERE `active_token` = '{$active_token}' AND `is_active` = '0'");
    if(($check > 0))
        return true;
    return false;
}


?>