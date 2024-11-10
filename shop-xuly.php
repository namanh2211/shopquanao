<?php
try {
    $conn = new PDO("mysql:host=localhost;
    dbname=duan1;
    charset=utf8", 
    "root",
     "mysql");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Số sản phẩm hiển thị trên mỗi trang
    $products_per_page = 8;

    // Kiểm tra trang hiện tại, mặc định là trang 1
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $products_per_page;

    // Lấy tổng số sản phẩm
    $total_products_stmt = $conn->prepare("SELECT COUNT(*) FROM products");
    $total_products_stmt->execute();
    $total_products = $total_products_stmt->fetchColumn();
    $total_pages = ceil($total_products / $products_per_page);

    // Truy vấn lấy sản phẩm cho trang hiện tại
    $stmt = $conn->prepare("SELECT * FROM products LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $products_per_page, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
    die();
}
?>
