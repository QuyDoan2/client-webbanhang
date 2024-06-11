<style>
    /* Main content container */
    .main-container {
        width: 60%;
        margin: 50px auto;
        /* Centers the content horizontally */
        background-color: #f9f9f9;
        margin-top: 100px;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Form title styles */
    .frmtitle h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Form content styles */
    .frmcontent {
        margin-top: 20px;
    }

    /* Table styles */
    .frmdsloai table {
        width: 100%;
        border-collapse: collapse;
    }

    .frmdsloai th,
    .frmdsloai td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .frmdsloai th {
        background-color: #f2f2f2;
    }

    /* Button container styles */
    .rowkhac.mb10 {
        margin-bottom: 10px;
    }

    /* Button styles */
    .rowkhac.mb10 input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #2196f3;
        color: white;
        cursor: pointer;
        margin-left: 10px;
        transition: background-color 0.3s ease;
        float: right;
        /* Thêm thuộc tính float: right; */
        animation: pulse 1.5s infinite;
    }

    .rowkhac.mb10 input[type="submit"]:hover {
        background-color: #0b7dda;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    /* Link button styles */
    .rowkhac.mb10 a input[type="button"] {
        background-color: #4caf50;
    }

    .rowkhac.mb10 a input[type="button"]:hover {
        background-color: #45a049;
    }

    .rowkhac form input[type="submit"] {
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    /* Định dạng cho bảng */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Định dạng cho header của bảng */
    thead {
        background-color: #f2f2f2;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        /* Đảm bảo kích thước của input bao gồm cả border và padding */
    }

    input[type="text"]:focus {
        border-color: #007bff;
        /* Màu khi input được focus */
        outline: none;
        /* Loại bỏ đường viền khi focus */
    }

    /* Định dạng cho cột ảnh */
    .product-image {
        max-width: 50px;
        height: auto;
    }

    /* Định dạng cho tổng cộng */
    tfoot td {
        font-weight: bold;
    }

    /* Định dạng cho phương thức thanh toán */
    .payment-method {
        margin-top: 20px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .payment-method span {
        font-weight: bold;
        font-size: 24px;
        margin-right: 10px;
    }

    .payment-method label {
        margin-right: 15px;
    }
</style>
<div class="main-container">
    <div class="rowkhac">
        <div class="rowkhac frmtitle mb">
            <H1>THÔNG TIN ĐẶT HÀNG</H1>
        </div>
        <form action="index.php?act=billconfirm" method="post" id="order-form">
            <div class="rowkhac frmcontent">
                <div class="rowkhac mb10 frmdsloai">
                    <table>
                        <?php
                        if (isset($_SESSION['user'])) {
                            $name = $_SESSION['user']['name'];
                            $telephone = $_SESSION['user']['telephone'];
                            $email = $_SESSION['user']['email'];
                            $address = $_SESSION['user']['address'];
                        } else {
                            $name = "";
                            $telephone = "";
                            $email = "";
                            $address = "";
                        }
                        ?>
                        <tr>
                            <td>
                                Người đặt hàng
                            </td>
                            <td>
                                <input type="text" name="name" value="<?= $name ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Địa chỉ
                            </td>
                            <td>
                                <input type="text" name="address" value="<?= $address ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                <input type="text" name="email" value="<?= $email ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Điện thoại
                            </td>
                            <td>
                                <input type="text" name="tel" value="<?= $telephone ?>" required>
                            </td>
                        </tr>

                    </table>

                </div>
                <div class="rowkhac mb10 frmdsloai">
                    <table>
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // print_r($_COOKIE);
                            $phiship = 15;

                            $sum_money = 0 +  $phiship;
                            for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
                                $image[$i] = $_SESSION['mycart'][$i][1];
                                $productName[$i] =  $_SESSION['mycart'][$i][2];
                                $id = $_SESSION['mycart'][$i][0];
                                $price = $_SESSION['mycart'][$i][3];
                                $quantity[$i] = isset($_COOKIE["quantity{$id}"]) ? $_COOKIE["quantity{$id}"] : $_SESSION['mycart'][$i][4];
                                $totalPrice[$i] = $quantity[$i] * $price;

                                $sum_money += $totalPrice[$i];
                            }

                            if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
                                for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
                                    // $gia = $_SESSION['mycart'][3];


                            ?>
                                    <tr>
                                        <td><img src="<?= $image[$i] ?>" alt="Product Image" class="product-image" style="width: 50px;"></td>
                                        <td><?= $productName[$i] ?></td>
                                        <td>$<?= $price ?></td>
                                        <td><?= $quantity[$i]  ?></td>
                                        <td>$<?= $totalPrice[$i] ?></td>
                                    </tr>
                            <?php

                                }
                            } else {
                                echo "<tr><td colspan='5'>Your cart is empty</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Phí Ship:</td>
                                <td id="grandtotal">$15</td>
                            </tr>
                            <tr>
                                <td colspan="4">Grand Total:</td>
                                <td id="grandtotal">$<?= $sum_money  ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <input type="hidden" name="grandtotal" value="<?= $sum_money ?>">
                    <div class="payment-method">
                        <span>Chọn Phương Thức Thanh Toán:</span>
                        <label><input type="radio" name="payment_method" value="1"> Thanh toán khi nhận hàng</label>
                        <label><input type="radio" name="payment_method" value="2"> Thanh toán Stripe(được miễn phí ship)</label>
                        
                    </div>
                    <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="accept" id="accept-button">
                </div>
            </div>
        </form>

    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("order-form");
        var radioButtons = document.getElementsByName("payment_method");

        for (var i = 0; i < radioButtons.length; i++) {
            radioButtons[i].addEventListener("change", function() {
                // Nếu radio button 1 được chọn
                if (this.value === "1") {
                    form.action = "index.php?act=billconfirm";
                }
                // Nếu radio button 2 được chọn
                else if (this.value === "2") {
                    form.action = "index.php?act=checkout";
                } else if (this.value === "3") {
                    form.action = "link-to-paypal-payment";
                }
                
                // Thêm các điều kiện khác nếu cần
            });
        }
    });

    function validateAndSubmitForm() {
        var name = document.querySelector('input[name="name"]').value;
        var address = document.querySelector('input[name="address"]').value;
        var email = document.querySelector('input[name="email"]').value;
        var tel = document.querySelector('input[name="tel"]').value;


        if (!name || !address || !email || !tel) {
            alert("Vui lòng điền đầy đủ thông tin vào các trường bắt buộc .");
        } else {
            document.getElementById("order-form").submit(); // Gửi form nếu thông tin hợp lệ
        }
    }
    document.getElementById("accept-button").addEventListener("click", validateAndSubmitForm);
    document.getElementById("order-form").addEventListener("submit", function(event) {
        var paymentMethodRadios = document.getElementsByName("payment_method");
        var isChecked = false;
        for (var i = 0; i < paymentMethodRadios.length; i++) {
            if (paymentMethodRadios[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Vui lòng chọn một phương thức thanh toán trước khi gửi form.");
            event.preventDefault();

        }
    });
</script>