<style>
    /* Style for select element */
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-top: 5px;
        background-color: #fff;
        /* Background color */
        color: #333;
        /* Text color */
        font-size: 16px;
        /* Font size */
        cursor: pointer;
    }

    /* Style for selected option */
    option[selected] {
        background-color: orange;
        /* Selected option background color */
        color: orange;
        /* Selected option text color */
    }

    /* Style for options */
    option {
        background-color: #fff;
        /* Options background color */
        color: #333;
        /* Options text color */
    }
    
</style>
<div class="main-content">
<div class="form-container row">
    <div class="row frmtitle">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row form-content">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row">
                DANH MỤC SẢN PHẨM <br>
                <select name="iddm" >
                    <option value="0">Tất cả</option>
                    <?php
                        foreach($loaddanhmuc as $danhmuc){
                            extract($danhmuc);
                            echo '<option value="' . $id . '">' . $name . '</option>';

                        }
                        
                    ?>
                  
                    
                </select>           
            </div>
            <div class="row">
                TÊN SẢN PHẨM <br>
                <input type="text" name="tensp">
            </div>
            <div class="row">
                GIÁ <br>
                <input type="text" name="giasp">
            </div>
            <div class="row">
                HÌNH <br>
                <input type="file" name="hinh">
            </div>
            <div class="row">
                MÔ TẢ <br>
                <textarea name="mota" cols="30" rows="10"></textarea>
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"> <input type="button" value="DANH SÁCH"></a>
            </div>

            <?php
                $thanhcong = "Thành công!";
                if (isset($thongbao) && $thongbao != "") {
                    echo "<div id='notification' class='notification'>
                    $thanhcong<br>
                    $thongbao
                    </div>";
                }
            ?>



        </form>
    </div>
</div>
</div>