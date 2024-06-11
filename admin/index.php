<?php 

    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/cart.php";
   
    include "header.php";
    //controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                // ktra xem nguoi dung co click vao nut add hay ko
                if (isset($_POST['themmoi'])&&$_POST['themmoi']) {
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                   
                }
               
                include "danhmuc/add.php";
                break;
            case 'listdm':
                //cai nao moi nhap thi dua len tren
                // $sql="select * from danhmuc order by id desc"
                $listdanhmuc=fetch_list_danhmuc();
                include "danhmuc/list.php";
                break;
            
            case 'xoadm':
                // ktra xem cai id cua san pham can xoa co ton tai va >0 ko
                if(isset($_GET['id'])&&($_GET['id']>0)){
                   delete_danhmuc($_GET['id']);  
                }
                // show list danh muc
                $listdanhmuc=fetch_list_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'suadm':
                // ktra xem cai id cua san pham can xoa co ton tai va >0 ko
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    // $sql = "select * from danhmuc where id=" . $_GET['id'];
                    $dm = loadone($_GET['id']);
                }
                include "danhmuc/update.php";
                break;
                //chinh thang hang format selection
            
            case 'updatedm':
                if(isset($_POST['capnhat'])&&$_POST['capnhat']){
                    $updatetenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_danhmuc($id, $updatetenloai);
                    $thongbao="Cập nhật thành công";
                }
                // $sql="select * from danhmuc order by id";
                // show list danh muc
                $listdanhmuc=fetch_list_danhmuc();
                include "danhmuc/list.php";
                break;
            
            
            case 'addsp':
            // ktra xem nguoi dung co click vao nut add hay ko
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $iddm=$_POST['iddm'];
                    $name_sp=$_POST['tensp'];
                    $price_sp=$_POST['giasp'];
                    $descript_sp=$_POST['mota'];
                    $file_name=$_FILES['hinh']['name']; // Tên của tệp
                    $target_dir="../uploads/";// thu muc luu tru hinh anh
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                       //echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    insert_sanpham($name_sp,$price_sp,$file_name,$descript_sp,$iddm);
                    $thongbao="Bạn đã thêm sản phẩm thành công!";
                }
                $loaddanhmuc=fetch_list_danhmuc();
                include "sanpham/add.php";
                break;

            case 'listsp':
                if (isset($_POST['submit'])&&($_POST['submit'])) {
                   $keyword=$_POST['keyword'];
                   $iddm=$_POST['iddm'];
                   
                }else{
                    $keyword="";
                    $iddm=0;
                }
                $listdanhmuc=fetch_list_danhmuc();
                $listsanpham=fetch_list_sanpham($keyword,$iddm);
                include "sanpham/list.php";
                break;
            
            case 'xoasp':
                // ktra xem cai id cua san pham can xoa co ton tai va >0 ko
                if(isset($_GET['id'])&&($_GET['id']>0)){
                   delete_sanpham($_GET['id'],$_GET['id']);  
                }
                //cai nao moi nhap thi dua len tren
                // $sql="select * from sanpham order by id desc"
                // $sql="select * from sanpham order by id";
                // show list danh muc
                $listsanpham=fetch_list_sanpham("",0);
                include "sanpham/list.php";
                break;
            case 'suasp':
                // ktra xem cai id cua san pham can xoa co ton tai va >0 ko
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    // $sql = "select * from sanpham where id=" . $_GET['id'];
                    $sanpham = loadone_sanpham($_GET['id']);
                }
                //$listsanpham=fetch_list_sanpham("",0);
                $listdanhmuc=fetch_list_danhmuc();
                include "sanpham/update.php";
                break;
              
            
            case 'updatesp':
                if(isset($_POST['capnhat'])&&$_POST['capnhat']){
                    //them id hidden nx
                    $id=$_POST['id'];
                    $iddm=$_POST['iddm'];
                    $name_sp=$_POST['tensp'];
                    $price_sp=$_POST['giasp'];
                    $descript_sp=$_POST['mota'];
                    $file_name=$_FILES['hinh']['name']; // Tên của tệp
                    $target_dir="../uploads/";// thu muc luu tru hinh anh
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($id, $iddm, $name_sp, $price_sp, $descript_sp, $file_name);
                    $thongbao="Chúc mừng, bạn đã cập nhật thành công";
                }
                $listdanhmuc=fetch_list_danhmuc();
                $listsanpham=fetch_list_sanpham("",0);
                include "sanpham/list.php";
                break;
            case 'dskh':
                $fetch_list_tk= fetch_list_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'addtk':
                if (isset($_POST['themmoi'])&& $_POST['themmoi']) {
                $name = $_POST['ten'];
                $email = $_POST['email'];
                $password = $_POST['matkhau'];
                $role = $_POST['vaitro'];
                add_taikhoan($name, $password, $email, $role);
                $thongbao = "Chúc mừng, bạn đã thêm tài khoản thành công!";
                }
                include "taikhoan/add.php";
                break;
             case 'xoataikhoan':
                    // ktra xem cai id cua san pham can xoa co ton tai va >0 ko
                   if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                       $id = $_GET['id'];
                       delete_taikhoan($id);
                   }
                   $fetch_list_tk= fetch_list_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'dsbl':
                $fetch_list_bl = fetch_list_binhluan();
                include "binhluan/list.php";
                break;
            case 'xoabl':
                if (isset($_GET['id']) && $_GET['id']>0 ) {
                   $id = $_GET['id'];
                   delete_id_bl($id);
                }
                $fetch_list_bl = fetch_list_binhluan();
                include "binhluan/list.php";
                break;

           
            case 'listbill':
                $all_bill =load_all_bill();
                include "donhang/listbill.php";
                break;
            case 'thongke':
                
                include "thongke/thongke.php";
                break;
            case 'transaction':
                include "transaction/transaction.php";
                break;
                
            case 'tkdm':
                $list_tkdm = load_tkdm();
                include "thongke/tkdm.php";
                break;
            case 'charttkdm':
                $list_tkdm = load_tkdm();
                include "thongke/charttkdm.php";
                break;
            case 'tkdt':
                $list_tkdt = load_tkdt();
                include "thongke/tkdt.php";
                break;
            case 'tkdmsp':
                $list_tkdm = load_tkdm();
                include "thongke/tkdmsp.php";
                break;
            default:
                include "home.php";
                break;
        }

    }else {
        include "home.php";
    }
    
    include "footer.php";
   
?>