<?php
/*
 * --------------------------------
 * EMAIL
 * --------------------------------
 * Trong phần này chúng ta khai báo các thông số để cấu hình
 * gửi mail bằng php
 * --------------------------------
 * GIẢI THÍCH BIẾN
 * --------------------------------
 * protocol: Giao thức gửi mail
 * smtp_host: Host gửi mail
 * smtp_port: Cổng
 * smtp_user: Tên đăng nhập tài khoản gửi mail
 * smtp_pass: Password tài khoản gửi mail
 * smtp_port: Cổng
 * mailtype: Định dạng nội dung mail
 * charset: Mã ký tự nội dung mail(UTF-8)
 */

$config['email'] = array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.googlemail.com',
    'smtp_fullname' => 'Nguyễn Văn Hùng',
    'smtp_user' => 'vanhung11501@gmail.com',
    'smtp_pass' => 'gigv xksk bjgq nvqo',
    'smtp_port' => 587,
    'smtp_secure' => 'tls',
    'smtp_timeout' => '7',
    'mailtype' => 'html',
    'charset' => 'UTF-8'
);