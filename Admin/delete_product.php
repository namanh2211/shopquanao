<?php
session_start();
include 'database.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Xóa sản phẩm từ cơ sở dữ liệu
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $productId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Lưu thông báo thành công vào session
        $_SESSION['message'] = "Xoá sản phẩm thành công!";
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
