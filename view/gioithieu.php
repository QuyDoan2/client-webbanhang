<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Typing Animation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg');
            /* Replace with your image URL */
            background-size: cover;
            /* Ensure the image covers the whole page */
            background-position: cover;
            /* Center the image */
            background-repeat: no-repeat;
            /* Prevent the image from repeating */
            background-attachment: fixed;
            /* Make the background fixed when scrolling */
        }

        h1,
        h2,
        h3 {
            color: #45a049;
        }

        .highlight {
            color: #FF5733;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }

        .margin-b {
            margin-bottom: 100px;
        }

        .box-c {
            width: 60%;
            margin-top: 100px;
            padding-left: 400px;
        }

        @media only screen and (max-width: 768px) {
            .box-c {
                width: 90%;
                /* Adjust width for smaller screens */
                margin-top: 50px;
                /* Adjust margin for smaller screens */
                padding-left: 20px;
                /* Adjust padding for smaller screens */
            }
        }

        .typing {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
            font-size: 38px;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: orange;
            }
        }

        .card {
            opacity: 0;
            transition: opacity 1s ease-in-out;
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card.visible {
            opacity: 1;
        }
    </style>
</head>

<body>

    <div class="box-c margin-b">
        <h1 class="typing">Giới Thiệu</h1>
        <div class="card">
            <p class="typing-text" style="color: orange; font-size: 30px;">Xin chào! Chúng tôi là cửa hàng bán quần áo trực tuyến X-SHOP .</p>
        </div>

        <h2 class="typing">Chúng Tôi Là Ai?</h2>
        <div class="card">
            <p class="typing-text" style="font-size: 28px;">Chúng tôi là một nhóm nhỏ nhưng đam mê về thời trang. Chúng tôi cung cấp những sản phẩm thời trang chất lượng và phong cách cho khách hàng của chúng tôi.</p>
        </div>

        <h2 class="typing">Sứ Mệnh Của Chúng Tôi</h2>
        <div class="card">
            <p class="typing-text" style="font-size: 28px;">Sứ mệnh của chúng tôi là mang lại sự hài lòng tuyệt đối cho khách hàng thông qua việc cung cấp những sản phẩm thời trang chất lượng nhất và dịch vụ chăm sóc khách hàng tốt nhất.</p>
        </div>

        <h2 class="typing">Tại Sao Chọn Chúng Tôi?</h2>
        <div class="card">
            <p class="typing-text" style="font-size: 28px;">Chúng tôi luôn cam kết về chất lượng sản phẩm, giá cả hợp lý và dịch vụ chăm sóc khách hàng tận tâm. Đội ngũ nhân viên của chúng tôi sẵn sàng hỗ trợ bạn mọi lúc, mọi nơi.</p>
        </div>

        <h2 class="typing">Liên Hệ</h2>
        <div class="card">
            <p class="typing-text" style="font-size: 28px;">Nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào, vui lòng liên hệ với chúng tôi qua địa chỉ email: <a href="mailto:info@X-shop.com" class="highlight">info@X-shop.com</a> hoặc số điện thoại: <span class="highlight">0123-456-789</span>.</p>
        </div>

        <a href="index.php" class="button">Quay Lại Trang Chủ</a>
    </div>

</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typingSpeed = 50;
        const delayBetweenTexts = 500;
        const typingTexts = document.querySelectorAll('.typing-text');
        const cards = document.querySelectorAll('.card');

        function typeText(element, text, index, callback) {
            if (index < text.length) {
                element.innerHTML += text.charAt(index);
                setTimeout(() => typeText(element, text, index + 1, callback), typingSpeed);
            } else {
                if (callback) callback();
            }
        }

        function showCard(index) {
            if (index < cards.length) {
                const card = cards[index];
                const typingText = card.querySelector('.typing-text');
                const text = typingText.innerHTML;

                typingText.innerHTML = ''; // Clear the text for typing effect
                card.classList.add('visible'); // Show the card
                typeText(typingText, text, 0, () => {
                    setTimeout(() => showCard(index + 1), delayBetweenTexts);
                });
            }
        }

        // Start the typing animation with the first card
        showCard(0);
    });
</script>