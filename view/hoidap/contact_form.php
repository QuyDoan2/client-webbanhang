<div class="contact-container">
    <h2>Phản ánh với Admin</h2>
    <form action="index.php?act=hoidap"  method="POST" >
        <label for="name" >Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="sub">Subject:</label>
        <input type="text" id="sub" name="sub" required><br><br>
        <label for="sender_email">Email của bạn:</label>
        <input type="email" id="sender_email" name="sender_email" required>
        
        <label for="message">Nội dung tin nhắn:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        
        <button type="button" id="insertImageBtn" style="margin-bottom: 10px;">Thêm Hình Ảnh</button>
        <button type="submit" name="submit">Gửi</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var insertImageBtn = document.getElementById('insertImageBtn');
        var messageTextarea = document.getElementById('message');

        insertImageBtn.addEventListener('click', function() {
            var method = prompt('Chọn phương thức nhập hình ảnh:\n1. Từ máy tính\n2. Từ URL');
            if (method === '1') {
                var fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = 'image/*';
                fileInput.addEventListener('change', function(event) {
                    var file = event.target.files[0];
                    var reader = new FileReader();
                    reader.onload = function(readerEvent) {
                        var imageUrl = readerEvent.target.result;
                        insertImageUrl(imageUrl);
                    };
                    reader.readAsDataURL(file);
                });
                fileInput.click();
            } else if (method === '2') {
                var imageUrl = prompt('Nhập đường dẫn của hình ảnh:');
                insertImageUrl(imageUrl);
            } else {
                alert('Phương thức không hợp lệ.');
            }
        });

        function insertImageUrl(imageUrl) {
            if (imageUrl) {
                var cursorPosition = messageTextarea.selectionStart;
                var textBeforeCursorPosition = messageTextarea.value.substring(0, cursorPosition);
                var textAfterCursorPosition = messageTextarea.value.substring(cursorPosition);

                messageTextarea.value = textBeforeCursorPosition + imageUrl + textAfterCursorPosition;
            }
        }
    });
</script>
