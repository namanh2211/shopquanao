<?php
session_start();
include 'database.php'; // Kết nối cơ sở dữ liệu

// Khởi tạo mảng lưu lỗi và dữ liệu cũ
$errors = [];
$old_data = [];

// Kiểm tra dữ liệu form có hợp lệ hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tên đăng nhập
    if (empty($_POST['username'])) {
        $errors['username'] = 'Vui lòng nhập tên đăng nhập.';
    } else {
        $old_data['username'] = $_POST['username'];

        // Kiểm tra tên đăng nhập đã tồn tại chưa
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$_POST['username']]);
        $username_count = $stmt->fetchColumn();
        if ($username_count > 0) {
            $errors['username'] = 'Tên đăng nhập đã tồn tại.';
        }
    }

    // Email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Vui lòng nhập email.';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email không hợp lệ.';
    } else {
        $old_data['email'] = $_POST['email'];

        // Kiểm tra email đã tồn tại chưa
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$_POST['email']]);
        $email_count = $stmt->fetchColumn();
        if ($email_count > 0) {
            $errors['email'] = 'Email đã tồn tại.';
        }
    }

    // Tên đầy đủ
    if (empty($_POST['fullname'])) {
        $errors['fullname'] = 'Vui lòng nhập tên đầy đủ.';
    } else {
        $old_data['fullname'] = $_POST['fullname'];
    }

    // Mật khẩu
    if (empty($_POST['password'])) {
        $errors['password'] = 'Vui lòng nhập mật khẩu.';
    }

    // Xác nhận mật khẩu
    if (empty($_POST['confirm_password'])) {
        $errors['confirm_password'] = 'Vui lòng xác nhận mật khẩu.';
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $errors['confirm_password'] = 'Mật khẩu xác nhận không khớp.';
    }

    // Quyền người dùng
    $role = isset($_POST['role']) && in_array($_POST['role'], ['0', '1']) ? $_POST['role'] : '0'; // Mặc định là '0' nếu không chọn

    // Nếu không có lỗi, thực hiện lưu vào cơ sở dữ liệu
    if (empty($errors)) {
        try {
            // Mã hóa mật khẩu
            $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // Chuẩn bị câu lệnh SQL để thêm người dùng vào cơ sở dữ liệu
            $stmt = $conn->prepare("INSERT INTO users (username, email, full_name, password, role) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([ 
                $_POST['username'],
                $_POST['email'],
                $_POST['fullname'],
                $hashed_password,
                $role
            ]);

            // Xóa dữ liệu và lỗi khỏi session
            unset($_SESSION['old_data'], $_SESSION['errors']);

            // Lưu thông báo thành công vào session
            $_SESSION['message'] = "Thêm tài khoản thành công!";

            // Chuyển hướng sang trang danh sách người dùng
            header("Location: user_list.php");
            exit;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        // Lưu lỗi và dữ liệu cũ vào session nếu có lỗi
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $old_data;

        // Chuyển hướng về form để người dùng chỉnh sửa
        header("Location: add_user.php");
        exit;
    }
}
