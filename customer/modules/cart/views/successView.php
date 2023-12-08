<?php 
$success = get_success_info();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SUCCESS</title>
</head>
    <style>
        img.logo {
            width: 180px;
            height: auto;
        }
        img.img_success {
            width: 100px;
            height: auto;
        }
        a {
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
        }
    </style>
<body>
    <div class="container">
        <div class="logo text-center mt-2">
            <img class="logo" src="public/images/ok.png" alt="">
        </div>
        <h2 class="text-center mt-2 text-success">Đặt hàng thành công</h2>
        <p>Mã đơn hàng: <strong><?php echo $success['order_code'] ?></strong></p>
        <p>Khách hàng: <strong><?php echo $success['fullname'] ?></strong></p>
        <p>Số điện thoại: <strong>0<?php echo $success['phone'] ?></strong></p>
        <p>Địa chỉ giao hàng: <strong><?php echo $success['address'] ?></strong></p>
        <p>Thời gian đặt hàng: <strong><?php echo $success['order_date'] ?></strong></p>
        <p>Phương thức thanh toán: <strong>
            <?php
            if($success['payment_method'] == "online") {
                ?>
                Chuyển khoản
                <?php
            }else {
                ?>
                Thanh toán khi nhận hàng
                <?php
            }    
            ?>
        </strong>
        </p>
        <div class="text-center mt-4">
        <h2 class="mt-2">Thông tin đơn hàng</h2>
            <table class="table-bordered col-12">
                <thead class="bg-warning">                
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                 <tbody>
                    <?php
                    foreach(get_list_by_cart() as $item) {
                        ?>
                        <tr>
                            <td><?php echo $item['product_code'] ?></td>
                            <td><img class="img_success" src="../admin/<?php echo $item['image_url'] ?>" alt=""></td>
                            <td><?php echo $item['product_name'] ?></td>
                            <td><?php echo $item['qty'] ?></td>
                            <td><?php echo currency_format($item['product_total_money']) ?></td>
                        </tr>      
                        <?php              
                    }
                    ?>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold; padding-right: 10px;">Tổng đơn hàng</td>
                        <td style="font-weight: bold;"><?php echo currency_format(get_total_cart()) ?></td>
                    </tr>
                </tbody>
            </table>
            <p class="mt-2">Thông tin đơn hàng đã được gửi vào email của bạn</p>
            <a class=" p-2 mt-2 bg-success text-white mb-5" href="https://mail.google.com/">Kiểm tra email</a>
            <a class=" p-2 mt-2 bg-primary text-white mb-5" href="?">Về trang chủ</a>
        </div>
    </div>
</body>
</html>