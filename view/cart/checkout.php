<?php
// Start session (if not already started)
session_start();
require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51PJXS603wqnUOiiMjhegX8FtVnRgylprGPLNR4Wo3bfkobQz0o1hKIuPKozPH9QCj0o1RRf1GxB9vqbHk8k7U7sc00hBEXHkCz";

\Stripe\Stripe::setApiKey($stripe_secret_key);

// Tạo mảng line_items từ thông tin sản phẩm
$line_items = [];
foreach ($billct as $product) {
    $total_price_dollars = ($product['totalprice'] *100)/2;
    $line_items[] = [
        "quantity" => $product['quantity'],
        "price_data" => [
            "currency" => "usd",
            "unit_amount" => $total_price_dollars, // Số tiền của sản phẩm (đơn vị là dollars)
            "product_data" => [
                "name" => $product['name']
            ]
        ]
    ];
}

// Tạo session thanh toán
$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/client(webbanhang)/view/cart/success.php",
    "cancel_url" => "http://localhost/client(webbanhang)/view/cart/cancelbill.php",
    "locale" => "auto",
    "line_items" => $line_items // Sử dụng mảng line_items đã được tạo từ cơ sở dữ liệu
]);
// Assuming $billct is an array
$_SESSION['billct'] = $billct;
$_SESSION['customer_info'] = $bill;
// Chuyển hướng người dùng đến trang thanh toán của Stripe
http_response_code(303);
header("Location: " . $checkout_session->url);
?>
