<?php
session_start();

// Kết nối tới cơ sở dữ liệu
try {
    $conn = new PDO("mysql:host=localhost;dbname=duan1;charset=utf8", "root", "mysql");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}

// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $hasError = false;

    // Xử lý lỗi cho trường username
    if (empty($username)) {
        $_SESSION['error_username'] = "Vui lòng nhập tên người dùng.";
        $hasError = true;
    } else {
        $_SESSION['username'] = $username; // Lưu lại giá trị của username để hiển thị lại nếu có lỗi
    }

    // Xử lý lỗi cho trường password
    if (empty($password)) {
        $_SESSION['error_password'] = "Vui lòng nhập mật khẩu.";
        $hasError = true;
    }

    // Nếu có lỗi, quay lại trang login
    if ($hasError) {
        header("Location: login.php");
        exit();
    } else {
        // Truy vấn để kiểm tra thông tin người dùng
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra xem người dùng có tồn tại và mật khẩu có khớp không
        if ($user && password_verify($password, $user['password'])) {
            // Đăng nhập thành công
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'full_name' => isset($user['full_name']) ? $user['full_name'] : ''
            ];
            // Xóa thông tin lỗi
            unset($_SESSION['error_username']);
            unset($_SESSION['error_password']);
            header("Location: index.php"); // Điều hướng tới trang chính
            exit();
        } else {
            // Thông tin đăng nhập không chính xác
            $_SESSION['error_password'] = "Tên người dùng hoặc mật khẩu không đúng.";
            header("Location: login.php");
            exit();
        }
    }
}
?>
