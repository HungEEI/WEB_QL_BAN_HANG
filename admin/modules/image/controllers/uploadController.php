<?php 

function construct() {

}

function uploadAction() {
  
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Bước 1: Tạo thư mục lưu file
        $error = array();
        $target_dir = "public/uploads/posts/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . basename($_FILES['file']['name']);
        // Kiểm tra kiểu file hợp lệ
        $type_file = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array(strtolower($type_file), $type_fileAllow)) {
            $error['file'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
        }
        //Kiểm tra kích thước file
        $size_file = $_FILES['file']['size'];
        if ($size_file > 5242880) {
            $error['file'] = "File bạn chọn không được quá 5MB";
        }
        // Kiểm tra file đã tồn tại trên hệ thống
        if (file_exists($target_file)) {
            $error['file'] = "File bạn chọn đã tồn tại trên hệ thống";
        }
        
        if(empty($error)) {         
            $user_id = db_fetch_row("SELECT * FROM `users`");
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $flag = true;
                // Thu thập thông tin tệp
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $data = [
                    'user_id' => $user_id['user_id'],
                    'image_url' => $target_file,
                    'image_name' => $_FILES['file']['name'],
                    'image_size' => $_FILES['file']['size'],
                    'created_at' => date('Y-m-d H:i:s') 
                ];
                $image_id = db_insert('images', $data);
                
                echo json_encode(array('status' => 'ok', 'file_path' => $target_file, 'image_id' => $image_id));
            } else {
                echo json_encode(array('status' => 'error'));
            }
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
}

function multiUploadAction() {
   
    if ($_SERVER['REQUEST_METHOD'] == "POST") { 
        //Bước 1: Tạo thư mục lưu file
        $error = array();
        // Số lượng ảnh upload 
	    $num_images = count($_FILES['file']['name']);
        $target_dir = "public/uploads/products/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $response = array();

        if(empty($error)) {         
            $user_id = db_fetch_row("SELECT * FROM `users`");
            // Duyệt từng ảnh để upload lên server 
	        for($i = 0; $i < $num_images; $i++){
                $target_file = $target_dir . basename($_FILES['file']['name'][$i]);
                if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
                    $flag = true;
                    // Thu thập thông tin tệp
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $data = [
                        'user_id' => $user_id['user_id'],
                        'image_url' => $target_file,
                        'image_name' => $_FILES['file']['name'][$i],
                        'image_size' => $_FILES['file']['size'][$i],
                        'created_at' => date('Y-m-d H:i:s') 
                    ];
                    $image_id = db_insert('images', $data);
                    $response[] = array('status' => 'ok', 'file_path' => $target_file, 'image_id' => $image_id);                               
                    
                } else {
                    $response[] = array('status' => 'error');
                }
            }
            $responseText = json_encode($response);
            echo $responseText;
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

}

?>