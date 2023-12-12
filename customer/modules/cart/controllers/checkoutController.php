<?php

function construct() {
    load_model('index');
    load_model('check');
}

function indexAction() {
    load_view('checkout');
}

function addAction() {
    $id = $_GET['id'];
    $product = get_product_by_id($id);

    # Thêm thông tin vào giỏ hàng
    $product_quantity = 1; // Mặc định số lượng ban đầu là 1

    // Kiểm tra xem giỏ hàng đã tồn tại chưa và id đã từng có trong mảng sp đã mua chưa
    if(isset($_SESSION['cart']) && is_array($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])){
        $product_quantity = $_SESSION['cart']['buy'][$id]['qty'] + 1; // sản phẩm + 1
    }

    $item = [
        'product_id' => $product['product_id'],
        'product_code' => $product['product_code'],
        'product_name' => $product['product_name'],
        'product_slug' => $product['product_slug'],
        'image_url' => $product['thumb'][0],
        'product_price' => $product['product_price'],
        'qty' => $product_quantity,
        'product_total_money' => $product['product_price'] * $product_quantity,
    ];

    if (!isset($_SESSION['cart']['buy']) || !is_array($_SESSION['cart']['buy'])) {
        $_SESSION['cart']['buy'] = [];
    }

    $_SESSION['cart']['buy'][$id] = $item;

    // Cập nhật hóa đơn
    update_info_cart();
    load_view('checkout');
}

function orderAction() {
    global $error, $fullname, $email, $address, $phone, $payment, $note;
    $user_id = db_fetch_row("SELECT user_id FROM `users`");
    if(isset($_POST['btn-order'])) {
        $error = array();
        #validation
        if(empty($_POST['fullname'])) {
            $error['fullname'] = "Hãy nhập Tên";
        }else {
            $fullname = $_POST['fullname'];
        }

        if(empty($_POST['address'])) {
            $error['address'] = "Hãy nhập địa chỉ giao hàng";
        }else {
            $address = $_POST['address'];
        }

        if(empty($_POST['phone'])) {
            $error['phone'] = "Hãy nhập số điện thoại liên hệ";
        }else {
            $phone = $_POST['phone'];
        }

        if (empty($_POST['email'])) {
            $error['email'] = "Hãy nhập email";
        } else {
            $email = $_POST['email'];     
            // Sử dụng filter_var để kiểm tra định dạng email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Địa chỉ email không hợp lệ";
            }
        }

        if(empty($_POST['payment'])) {    
            $error['payment'] = "Hãy chọn phương thức thanh toán";
        }else {
            $payment = isset($_POST['payment']) ? $_POST['payment'] : 'online';
        }

        $note = $_POST['note'];
        if(empty($error)) {
            # add customer
            $data_customer = [
                'fullname' => $fullname,
                'email' => $email,
                'phone' => $phone,
                'address' => $address
            ];
            $customer_id = db_insert('customer', $data_customer);

            # add orders
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data_order = [
                'user_id' => (int)$user_id,
                'customer_id' => (int)$customer_id,
                'product_quantity' => get_num_oder_cart(),
                'total_amount' => get_total_cart(),
                'payment_method' => $payment,
                'note' => $note,
                'shipping_address' => $address,     
                'order_code' => "",
                'order_date' => date('Y-m-d H:i:s'),
            ];
            // Chuyển đổi giá trị của mảng thành chuỗi
            foreach ($data_order as $key => $value) {
                $data_order[$key] = is_array($value) ? json_encode($value) : (string) $value;
            }
            $order_id = db_insert('orders', $data_order);
            $current_time = time(); # lấy time hiện tại theo dạng chuỗi
            $time_format = date("Hs", $current_time);
            $order_code = "#NVH".$order_id . "_" . $time_format;
            $update_order_coder = [
                'order_code' => $order_code
            ];
            db_update('orders', $update_order_coder, "order_id = '{$order_id}'");
            # add order_items
            foreach (get_list_by_cart() as $product) {
                $data_order_item = [
                    'order_id' => (int)$order_id,
                    'product_id' => (int)$product['product_id'],
                    'price' => $product['product_price'],
                    'quantity' => $product['qty']
                ];

                db_insert('order_items', $data_order_item);
            }
            redirect("?mod=cart&controller=checkout&action=success&id={$customer_id}"); 
        }  
    }
}

function successAction() {
    $success = get_success_info();
    $cart = get_list_by_cart();
    $email = $success['email'];
    $fullname = $success['fullname'];
    $subject = 'THÔNG TIN ĐƠN HÀNG CỦA BẠN';
    $content = "
        <body>
            <h1 style='text-align: center;'>Thông tin đơn hàng</h1>
            <p>Mã đơn hàng: <strong>{$success['order_code']}</strong></p>
            <p>Khách hàng: <strong>{$success['fullname']}</strong></p>
            <p>Số điện thoại: <strong>0{$success['phone']}</strong></p>
            <p>Địa chỉ giao hàng: <strong>{$success['address']}</strong></p>
    ";
    
    $content .= "
        <table border='1' style='width: 100%; border-collapse: collapse; margin-top: 20px'>
            <thead>
                <tr style='background: orange;'>
                    <th colspan='5' style='padding: 10px; font-size: 28px;'>
                        Hóa đơn thanh toán
                    </th>
                </tr>
                <tr style='background: #dcd5ca;'>
                    <th style='padding-top: 5px; padding-bottom: 5px;'>Mã sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody style='text-align: center;'>
    ";
    
    foreach ($cart as $item) {
        $content .= "
            <tr>
                <td style='padding-top: 5px; padding-bottom: 5px;'>{$item['product_code']}</td>
                <td><img style='width: 120px;' src='{$item['image_url']}' alt=''></td>
                <td>{$item['product_name']}</td>
                <td>{$item['qty']}</td>
                <td>" . currency_format($item['product_total_money']) . "</td>
            </tr>
        ";
    }
    
    $content .= "
            <tr>
                <td colspan='4' style='text-align: right; font-weight: bold; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;'>Tổng đơn hàng</td>
                <td style='font-weight: 600; text-align: left; padding-left: 10px; padding-top: 5px; padding-bottom: 5px; color: red; font-size: 16px;'>" . currency_format(get_total_cart()) . "</td>
            </tr>
        </tbody>
    </table>
    </body>
    ";
         
    send_email($email, $fullname, $subject, $content);               
    load_view('success');
    delete_cart_buy();
}

?>