<?php
/**
 * Lấy danh sách sản phẩm theo trang
 * @param int $page Trang hiện tại
 * @param int $perPage Số lượng sản phẩm trên mỗi trang
 * @return array Mảng chứa danh sách sản phẩm
 */
function getProductsByPage($page, $perPage) {
    $offset = ($page - 1) * $perPage;
    $sql = "select * from sanpham  order by id desc limit $offset, $perPage";
    return pdo_query($sql);
}

/**
 * Đếm tổng số sản phẩm
 * @return int Tổng số sản phẩm
 */
function getTotalProductsCount() {
    $sql = "SELECT COUNT(*) AS total FROM sanpham";
    return pdo_query_value($sql);
}


?>
