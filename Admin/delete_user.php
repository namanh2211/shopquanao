<?php
session_start();
include 'database.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra nếu ID người dùng được truyền vào
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    try {
        // Chuẩn bị câu lệnh SQL để xóa người dùng
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$user_id]);

        // Lưu thông báo thành công vào session
        $_SESSION['message'] = "Xóa người dùng thành công!";

        // Chuyển hướng về trang danh sách người dùng
        header("Location: user_list.php");
        exit;
    } catch (PDOException $e) {
        // Nếu có lỗi trong quá trình xóa, hiển thị thông báo lỗi
        $_SESSION['error'] = "Lỗi: " . $e->getMessage();
        header("Location: user_list.php");
        exit;
    }
} else {
    // Nếu không có ID hợp lệ, chuyển hướng về trang danh sách người dùng
    $_SESSION['error'] = "ID người dùng không hợp lệ.";
    header("Location: user_list.php");
    exit;
}
