<?php 

# Trả về true nếu đã login
function is_login() {
    if(isset($_SESSION['is_login']))
        return true;
    return false;
}

# Trả về username của người login
function user_login() {
    if(!empty($_SESSION['user_login'])){
        return $_SESSION['user_login'];
    }
    return false;
}

# Trả về thông tin user login(username)
function info_user($field = 'id'){
    global $list_users;
    if(isset($_SESSION['is_login'])){
        foreach($list_users as $user){
            if($_SESSION['user_login'] == $user['username']){
                if(array_key_exists($field, $user)){
                    return $user[$field];
                }
            }
        }
    }
    return false;
}

?>