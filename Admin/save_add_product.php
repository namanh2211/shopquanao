<?php
session_start();
include 'database.php'; // Kết nối cơ sở dữ liệu

// Khởi tạo mảng lưu lỗi và dữ liệu cũ
$errors = [];
$old_data = [];

// Kiểm tra dữ liệu form có hợp lệ hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tên sản phẩm
    if (empty($_POST['product_name'])) {
        $errors['product_name'] = 'Vui lòng nhập tên sản phẩm.';
    } else {
        $old_data['product_name'] = $_POST['product_name'];
    }

    // Mô tả sản phẩm
    if (empty($_POST['description'])) {
        $errors['description'] = 'Vui lòng nhập mô tả sản phẩm.';
    } else {
        $old_data['description'] = $_POST['description'];
    }

    // Loại sản phẩm
    if (empty($_POST['category_id'])) {
        $errors['category_id'] = 'Vui lòng chọn loại sản phẩm.';
    } else {
        $old_data['category_id'] = $_POST['category_id'];
    }

    // Giá sản phẩm
    if (empty($_POST['price'])) {
        $errors['price'] = 'Vui lòng nhập giá sản phẩm.';
    } else {
        $old_data['price'] = $_POST['price'];
    }

    // Số lượng sản phẩm
    if (empty($_POST['stock'])) {
        $errors['stock'] = 'Vui lòng nhập số lượng sản phẩm.';
    } else {
        $old_data['stock'] = $_POST['stock'];
    }

    // Hình ảnh sản phẩm
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = basename($_FILES['image']['name']);
        $target_path = 'uploads/' . $image_name;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $errors['image'] = 'Lỗi khi tải ảnh lên.';
        }
    } else {
        $errors['image'] = 'Vui lòng chọn ảnh sản phẩm.';
    }

    // Nếu không có lỗi, thực hiện lưu vào cơ sở dữ liệu
    if (empty($errors)) {
        try {
            $stmt = $conn->prepare("INSERT INTO products (product_name, description, category_id, price, stock, image) VALUES (:product_name, :description, :category_id, :price, :stock, :image)");
            $stmt->execute([
                ':product_name' => $_POST['product_name'],
                ':description' => $_POST['description'],
                ':category_id' => $_POST['category_id'],
                ':price' => $_POST['price'],
                ':stock' => $_POST['stock'],
                ':image' => $image_name
            ]);

            // Xóa dữ liệu và lỗi khỏi session
            unset($_SESSION['old_data'], $_SESSION['errors']);

            // Lưu thông báo thành công vào session
            session_start();
            $_SESSION['message'] = "Thêm loại sản phẩm thành công!";
            

            // Chuyển hướng sang product_list.php
            header("Location: product_list.php");
            exit;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        // Lưu lỗi và dữ liệu cũ vào session nếu có lỗi
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $old_data;

        // Chuyển hướng về form để người dùng chỉnh sửa
        header("Location: add_product.php");
        exit;
    }
}
