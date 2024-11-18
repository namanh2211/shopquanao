<?php
// Nhúng file kết nối cơ sở dữ liệu
include 'database.php';

// Khởi tạo mảng lưu lỗi
$errors = [
    'category_name' => '',
    'description' => ''
];

// Kiểm tra nếu form đã được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $category_name = trim($_POST['category_name']);
    $description = trim($_POST['description']);

    // Kiểm tra từng trường
    if (empty($category_name)) {
        $errors['category_name'] = "Tên loại sản phẩm không được để trống.";
    }
    if (empty($description)) {
        $errors['description'] = "Mô tả loại sản phẩm không được để trống.";
    }

    // Nếu không có lỗi, tiến hành lưu dữ liệu vào cơ sở dữ liệu
    if (!array_filter($errors)) {
        $sql = "INSERT INTO categories (category_name, description) VALUES (:category_name, :description)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':category_name' => $category_name,
                ':description' => $description,
            ]);

            // Lưu thông báo thành công vào session
            session_start();
            $_SESSION['message'] = "Thêm loại sản phẩm thành công!";
            
            // Chuyển hướng về trang danh sách loại sản phẩm
            header("Location: category_list.php");
            exit;
        } catch (PDOException $e) {
            header("Location: add_category.php?message=error");
            exit;
        }
    } else {
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $_POST;
        header("Location: add_category.php");
        exit;
    }
}
?>
