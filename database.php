<?php
// Thông tin kết nối cơ sở dữ liệu
$host = 'localhost';        // Địa chỉ máy chủ
$dbname = 'duan1';          // Tên cơ sở dữ liệu
$username = 'root';         // Tên người dùng cơ sở dữ liệu
$password = 'mysql';        // Mật khẩu MySQL của bạn

try {
    // Kết nối cơ sở dữ liệu bằng PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Thiết lập chế độ lỗi cho PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Hiển thị lỗi và dừng thực thi nếu không kết nối được
    die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
}
?>
