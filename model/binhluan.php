<?php
    function insert_binhluan($content, $idpro, $iduser, $commentdate){
        $sql="insert into binhluan(content,idpro,iduser,commentdate) values('$content', '$idpro', '$iduser', '$commentdate')";
        pdo_execute($sql);
    }
    function fetch_all_comment($idpro){
        $sql = "select * from binhluan where idpro='".$idpro."' order by id desc";
        $listbinhluan=pdo_query($sql);
        return $listbinhluan;
    }
    function fetch_list_binhluan(){
        $sql="select * from binhluan order by id desc";
        // show list danh muc
        $listbinhluan=pdo_query($sql);
        return $listbinhluan;
    }
    function delete_id_bl($id){
        $sql="delete from binhluan where id=".$id;
        pdo_execute($sql);
    }
?>