<?php
include 'database.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Kiểm tra xem danh mục có sản phẩm liên kết không
    $sqlCheckProducts = "SELECT COUNT(*) FROM products WHERE category_id = :id";
    $stmtCheckProducts = $conn->prepare($sqlCheckProducts);
    $stmtCheckProducts->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtCheckProducts->execute();
    $productCount = $stmtCheckProducts->fetchColumn();

    if ($productCount > 0) {
        // Nếu có sản phẩm liên kết, hiển thị thông báo lỗi
        $_SESSION['message'] = 'Danh mục còn chứa sản phẩm nên không thể xóa!';
    } else {
        // Nếu không có sản phẩm liên kết, thực hiện xóa danh mục
        $sqlDeleteCategory = "DELETE FROM categories WHERE id = :id";
        $stmtDeleteCategory = $conn->prepare($sqlDeleteCategory);   
        $stmtDeleteCategory->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            $stmtDeleteCategory->execute();
            $_SESSION['message'] = 'Danh mục đã được xóa thành công!';
        } catch (Exception $e) {
            $_SESSION['message'] = 'Có lỗi xảy ra khi xóa danh mục: ' . $e->getMessage();
        }
    }
}

// Chuyển hướng về trang danh sách danh mục
header('Location: category_list.php');
exit;
?>
