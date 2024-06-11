<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    $idpro = $_REQUEST['idpro'];
    $listbinhluan = fetch_all_comment($idpro);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình Luận</title>
    <link rel="stylesheet" href="../css/cmt.css">
</head>
<body>

<div class="border-under-dt">
    <h1><i class="fa fa-comment" aria-hidden="true"></i> Bình luận</h1>
</div>

<div class="comment-container">
    <?php
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (isset($_SESSION['user'])) {
            // Nếu đã đăng nhập, hiển thị form bình luận
            echo '<form class="comment" action="'.$_SERVER['PHP_SELF'].'" method="post">
                    <div class="user-image">
                        <img src="avatar.png" alt="Your Image">
                    </div>
                    <div class="comment-content">
                        <input type="hidden" name="idpro" value="'.$idpro.'">
                        <textarea name="comment" rows="3" placeholder="Write your comment here..."></textarea>
                        <input type="submit" value="Submit" name="guibinhluan">
                    </div>
                </form>';
        } else {
            // Nếu chưa đăng nhập, hiển thị thông báo và nút đăng nhập
            echo '<div class="login-message">Mời quý khách <a href="index.php?act=dangnhap">đăng nhập</a> để sử dụng tính năng bình luận!</div>';
        }
    ?>

    <?php
        // Hiển thị danh sách bình luận
        foreach ($listbinhluan as $listbinhluan) {
            extract($listbinhluan);
            echo '<div class="comment">
                    <div class="user-image">
                        <img src="avatar.png" alt="User 1">
                    </div>
                    <div class="comment-content">
                        <p class="comment-author">'.$iduser.'</p>
                        <p class="comment-text">'.$content.'</p>
                        <p class="comment-text">'.$commentdate.'</p>
                    </div>
                </div>';
        }
    ?>

    <?php
        // Xử lý khi người dùng gửi bình luận
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan']!="") ) {
            $content = $_POST['comment'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['name'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $commentdate = date('D, d M Y H:i:s');
            insert_binhluan($content, $idpro, $iduser, $commentdate);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    ?>
</div>
</body>
</html>
