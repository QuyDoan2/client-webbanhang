function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
}
function toggleChat() {
    var chatContainer = document.querySelector('.chat-container');
    chatContainer.style.display = chatContainer.style.display === 'none' ? 'block' : 'none';
  }
  
  function sendMessage() {
    var inputField = document.querySelector('.chat-input input');
    var message = inputField.value;
    
    if (message.trim() !== '') {
      var chatMessages = document.getElementById('chatMessages');
      var messageElement = document.createElement('div');
      messageElement.classList.add('message');
      messageElement.textContent = message;
      chatMessages.appendChild(messageElement);
      inputField.value = '';
    }
  }

  function showAnswer(question) {
    var chatMessages = document.getElementById('chatMessages');

    // Tên và hình ảnh của chatbot
    var botName = "Chatbot";
    var botAvatar = "avatar.png"; // Đường dẫn đến hình ảnh avatar của chatbot

    // Xử lý các vấn đề và đưa ra câu trả lời tương ứng
    if (question === 'origin') {
        var message = "Sản phẩm của chúng tôi được sản xuất bởi các nhà sản xuất uy tín trên toàn cầu, bao gồm cả Việt Nam và các quốc gia khác. Chúng tôi cam kết cung cấp sản phẩm chất lượng cao và đảm bảo rằng tất cả các sản phẩm đều tuân thủ các tiêu chuẩn an toàn và môi trường.";
    } else if (question === 'quality') {
        var message = "Chúng tôi cam kết cung cấp sản phẩm chất lượng cao cho khách hàng.";
    } else if (question === 'quytrinh') {
        var message = "Để đặt hàng, bạn chỉ cần chọn sản phẩm bạn muốn mua và thêm vào giỏ hàng. Sau đó, bạn tiến hành thanh toán và chúng tôi sẽ xử lý đơn hàng của bạn ngay lập tức.";
    }
    else if (question === 'timegiaohang') {
        var message = "Thời gian giao hàng dự kiến là từ 3 đến 5 ngày làm việc, tùy thuộc vào địa chỉ của bạn và phương thức vận chuyển bạn chọn.";
    }
    else if (question === 'thanhtoan') {
        var message = "Hiện tại, chúng tôi không cung cấp dịch vụ trả góp";
    }
    else if (question === 'discount') {
        var message = "Khi bạn hoàn tất thanh toán, hãy nhập mã giảm giá của bạn vào ô Mã giảm giá và bấm Áp dụng. Giá trị giảm giá sẽ được tính vào tổng đơn hàng của bạn.";
    }
     else {
        var message = "Xin lỗi, không có câu trả lời cho câu hỏi này.";
    }

    // Tạo một phần tử div mới chứa avatar, tên và nội dung tin nhắn của chatbot
    var messageElement = document.createElement('div');
    messageElement.classList.add('bot-message');
    messageElement.innerHTML = `
    <div class="bot-info">
    <div class="avatar-name">
        <img src="${botAvatar}" alt="${botName}" class="bot-avatar">
        <span class="bot-name">${botName}</span>
    </div>
    <div class="message-content">${message}</div>
    </div>
    
    `;

    chatMessages.appendChild(messageElement);
      // Cuộn xuống để hiển thị tin nhắn mới
      chatMessages.scrollTop = chatMessages.scrollHeight;
}

  document.getElementById('left').addEventListener('click', slideLeft);
  document.getElementById('right').addEventListener('click', slideRight);

  function slideLeft() {
    const carousel = document.querySelector('.carousel');
    carousel.scrollLeft -= carousel.offsetWidth;
  }

  function slideRight() {
    const carousel = document.querySelector('.carousel');
    carousel.scrollLeft += carousel.offsetWidth;
  }

  function validateLoginForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username.trim() === '' || password.trim() === '') {
        alert('Quý khách cần điền đầy đủ tên email và mật khẩu!');
        return false; // Ngăn chặn gửi form nếu thông tin không hợp lệ
    }
    return true; // Cho phép gửi form nếu thông tin hợp lệ
  }

  function hideErrorMessage() {
    var errorMessage = document.getElementById('notification-error');
    errorMessage.style.display = 'none';
  }
  function validateForm() {
    var newPassword = document.getElementById('new_password').value;
    var confirm = document.getElementById('confirm').value;

    // Kiểm tra xem hai mật khẩu có giống nhau không
    if (newPassword !== confirm) {
        alert("Password and Confirm Password do not match.");
        return false; // Ngăn chặn gửi form nếu mật khẩu không khớp
    }
    return true; // Cho phép gửi form nếu mật khẩu khớp
}













