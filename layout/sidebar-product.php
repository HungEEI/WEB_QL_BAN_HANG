<?php
$list_cat = db_fetch_array("SELECT * FROM `product_categories`");
foreach ($list_cat as &$p) {
    $slug = create_slug($p['category_slug']);
    $p['url_cat'] = "danh-muc/{$p['product_category_id']}-{$slug}.html";
}
?>

<div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <?php echo render_menu($list_cat) ?>                
                </div>
            </div>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="GET" action="">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Dưới 500.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>500.000đ - 1.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>1.000.000đ - 5.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>5.000.000đ - 10.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Trên 10.000.000đ</td>
                                </tr>
                            </tbody>
                        </table>                 
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Lắng nghe sự kiện thay đổi của các nút radio
                let priceRadios = document.querySelectorAll('input[name="r-price"]');
                priceRadios.forEach(function(radio) {
                    radio.addEventListener('change', filterByPrice);
                });
            });

            function filterByPrice() {
                let selectedPrice = document.querySelector('input[name="r-price"]:checked');
                
                if (selectedPrice) {
                    // Lấy giá trị của nút radio được chọn
                    let priceValue = selectedPrice.value;

                    console.log(priceValue);

                    // Cập nhật URL với phạm vi giá đã chọn
                    let queryParams = new URLSearchParams(window.location.search);
                    queryParams.set("price", priceValue);
                    window.history.replaceState(null, null, "?" + queryParams.toString());

                    // Bạn có thể sử dụng AJAX để lấy và hiển thị sản phẩm dựa trên phạm vi giá đã chọn
                    // Cập nhật HTML để hiển thị danh sách sản phẩm đã lọc được.
                } else {
                    // Xử lý trường hợp không có phạm vi giá nào được chọn
                    console.log("Không có phạm vi giá nào được chọn");
                }
            }
        </script>
