<style>
        /* Main content container */
.main-container {
    width: 80%;
    float: right;
    margin-right: 20px;
    /* margin: 50px auto; Centers the content horizontally */
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
.rowkhac.mb10 input[type="button"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #2196f3;
    color: white;
    cursor: pointer;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.rowkhac.mb10 input[type="button"]:hover {
    background-color: #0b7dda;
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

</style>
<div class="main-container">
<div class="rowkhac">
    <div class="rowkhac frmtitle mb">
        <H1>DANH SÁCH SẢN PHẨM</H1>
    </div>
    <form action="index.php?act=listsp" method="post">
        <input type="text" name="keyword" placeholder="Nhap ten san pham" >
        <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Tìm Kiếm" name="submit">
    </form>
    <div class="rowkhac frmcontent">
        <div class="rowkhac mb10 frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>GIÁ</th>
                    <th>HÌNH</th>
                    <th>MÔ TẢ</th>
                    <th>LƯỢT XEM</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listsanpham as $sanpham) {
                    //khai khac data tu bang sanpham
                    extract($sanpham);
                    // action sua va xoa san pham
                    $suasp = "index.php?act=suasp&id=" . $id;
                    $xoasp = "index.php?act=xoasp&id=" . $id;
                    $img_path = "../uploads/" . $image;
                    //ktra xem img_path co dc xuat tu file hay ko
                    if (is_file($img_path)) {
                        $images = "<img src='" . $img_path . "' height='80'>";
                    } else {
                        $images = "Image path is not found";
                    }

                    echo '  <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $price . '</td>
                                <td>' . $images . '</td>
                                <td>' . $description . '</td>
                                <td>' . $view . '</td>
                                <td>
                                <a href="'. $suasp .'"><input type="button" value="Sửa"></a>
                                <a href="'. $xoasp .'"><input type="button" value="Xóa"></a>
                                </td>
                                </td>
                            </tr>';
                }
                ?>
            </table>
        </div>
        <div class="rowkhac mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>
</div>