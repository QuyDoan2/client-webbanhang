<?php
    // chuyen logic vs database sang model de easy chinh sua

    function insert_sanpham($name_sp,$price_sp,$file_name,$descript_sp,$iddm){
        $sql="insert into sanpham(name,price,image,description,iddm) values('$name_sp','$price_sp','$file_name','$descript_sp','$iddm')";
        pdo_execute($sql);
    }
    function delete_sanpham($id,$idpro){   
        $sql = "delete from cart where idpro=".$idpro;
        pdo_execute($sql);
    
        $sql="delete from sanpham where id=".$id;
        pdo_execute($sql);
    }
    function fetch_list_sanpham($keyword,$iddm){
        $sql="select * from sanpham where 1";
        if ($keyword!="") {
           $sql.=" and name like'%".$keyword."%'";
        }
        if ($iddm>0) {
            $sql.=" and iddm ='".$iddm."'";
        }
        $sql.=" order by id desc";
        // show list danh muc
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    
    function loadone_sanpham($id){
        $sql = "select * from sanpham where id=".$id;
        $sanpham=pdo_query_one($sql);
        return $sanpham;
    }
    function load_sp_cungloai($id,$iddm){
        $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function update_sanpham($id, $iddm, $name_sp, $price_sp, $descript_sp, $file_name){
        // Update the database with the new values
        // Example:
        // $query = "UPDATE your_table SET iddm = '$iddm', tensp = '$tensp', giasp = '$giasp', mota = '$mota' WHERE id = '$id'";
        // Execute the query and perform necessary error handling
        // Redirect or display a success message
        if ($file_name!="") {
            $sql="update sanpham set iddm='$iddm', name='$name_sp', price='$price_sp', image='$file_name', description='$descript_sp' where id= '$id'";
        }else {
            $sql="update sanpham set iddm='$iddm', name='$name_sp', price='$price_sp', description='$descript_sp' where id= '$id'";
        }
        
        pdo_execute($sql);

    }
    function load_sanpham_home(){
        // gioi han chi co 9 sp moi nhat hien len
        $sql="select * from sanpham where 1 order by id desc limit 0,10 ";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function load_top_sanpham(){
        // gioi han chi co 8 sp top hien len
        $sql="select * from sanpham where 1 order by view desc limit 8";
        $topsp=pdo_query($sql);
        return $topsp;
    }

    function load_ten_danhmuc($iddm){
        if ($iddm>0) {
            $sql = "select * from danhmuc where id=".$iddm;
            $dm = pdo_query_one($sql);
            extract($dm);
            return $name;
        }else {
            return "";
        }

    }
    // Function fetch_list_danhmucsanpham với tham số phân trang
    function fetch_list_danhmucsanpham($keyword, $iddm, $page, $limit) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM sanpham WHERE 1";
        if ($keyword != "") {
            $sql .= " AND name LIKE '%" . $keyword . "%'";
        }
        if ($iddm > 0) {
            $sql .= " AND iddm ='" . $iddm . "'";
        }
            $sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";
        // Thực hiện truy vấn SQL
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    
    function getTotalPages($iddm, $limit) {
        // Câu truy vấn SQL để đếm tổng số truyện trong thể loại đã chọn
        $sql = 'SELECT COUNT(*) as total FROM sanpham WHERE iddm = ?';
   
        // Sử dụng hàm pdo_query để thực hiện câu truy vấn
        $result = pdo_query($sql, $iddm);
    
        // Lấy tổng số lượng truyện từ kết quả truy vấn
        if (isset($result[0]['total'])) {
            $totalTruyen = $result[0]['total'];
        } else {
            $totalTruyen = 0;
        }
   
        // Tính tổng số trang
        $totalPages = ceil($totalTruyen / $limit);
        return $totalPages;
    }
    


    function fetch_and_display_view($id){
        // Cập nhật số lượt xem cho sản phẩm
        $sql_update = "UPDATE sanpham SET view = view + 1 WHERE id = $id";
         // Chuẩn bị và thực thi truy vấn cập nhật
        pdo_execute($sql_update);

    }

?>


