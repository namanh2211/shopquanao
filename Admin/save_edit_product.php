<?php
session_start();
include 'database.php'; // Kết nối cơ sở dữ liệu


// Kiểm tra nếu form được gửi đi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_FILES['image'];

    // Kiểm tra nếu tên sản phẩm, mô tả, và các trường quan trọng khác không bị bỏ trống
    if (empty($product_name) || empty($description) || empty($category_id) || empty($price) || empty($stock)) {
        $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin sản phẩm.";
        header("Location: edit_product.php?id=" . $product_id);
        exit;
    }

    // Xử lý hình ảnh (nếu có)
    if ($image['error'] == 0) {
        // Xử lý file hình ảnh (upload vào thư mục images/)
        $image_name = time() . "_" . basename($image['name']);
        $image_path = "images/" . $image_name;

        if (!move_uploaded_file($image['tmp_name'], $image_path)) {
            $_SESSION['message'] = "Lỗi khi tải lên hình ảnh.";
            header("Location: edit_product.php?id=" . $product_id);
            exit;
        }
    } else {
        // Nếu không có hình ảnh mới, giữ lại hình ảnh cũ
        $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        $image_name = $product['image'];
    }

    // Cập nhật sản phẩm trong cơ sở dữ liệu
    try {
        $sql = "UPDATE products 
                SET product_name = ?, description = ?, category_id = ?, price = ?, stock = ?, image = ? 
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$product_name, $description, $category_id, $price, $stock, $image_name, $product_id]);

        $_SESSION['message'] = "Cập nhật sản phẩm thành công.";
        header("Location: product_list.php");
        exit;

    } catch (PDOException $e) {
        $_SESSION['message'] = "Lỗi khi cập nhật sản phẩm: " . $e->getMessage();
        header("Location: edit_product.php?id=" . $product_id);
        exit;
    }
} else {
    // Nếu không phải là yêu cầu POST
    $_SESSION['message'] = "Yêu cầu không hợp lệ.";
    header("Location: product_list.php");
    exit;
}
