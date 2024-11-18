<?php
session_start(); // Bắt đầu phiên làm việc

// Thông tin kết nối
$host = 'localhost'; // Địa chỉ máy chủ
$dbname = 'duan1';   // Tên cơ sở dữ liệu
$username = 'root';  // Tên người dùng cơ sở dữ liệu
$password = 'mysql'; // Thay bằng mật khẩu MySQL của bạn

try {
    // Kết nối cơ sở dữ liệu với PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Thiết lập chế độ lỗi cho PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lưu thông báo kết nối thành công vào session
    $_SESSION['db_message'] = "<p style='color:green;'>Kết nối cơ sở dữ liệu thành công!</p>";
} catch (PDOException $e) {
    // Lưu thông báo lỗi vào session
    $_SESSION['db_message'] = "<p style='color:red;'>Kết nối thất bại: " . $e->getMessage() . "</p>";
    exit; // Dừng thực thi nếu không kết nối được
}
?>
