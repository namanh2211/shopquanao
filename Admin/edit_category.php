<?php
session_start();
include 'database.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem có ID loại sản phẩm trong URL hay không
if (!isset($_GET['id'])) {
    $_SESSION['message'] = "Không tìm thấy loại sản phẩm.";
    header("Location: category_list.php");
    exit;
}

$category_id = $_GET['id'];
$errors = [];
$old_data = [];

// Lấy dữ liệu loại sản phẩm từ cơ sở dữ liệu
$stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$category_id]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    $_SESSION['message'] = "Không tìm thấy loại sản phẩm.";
    header("Location: category_list.php");
    exit;
}

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'] ?? '';
    $description = $_POST['description'] ?? '';  // Lấy dữ liệu mô tả

    // Kiểm tra trường tên loại sản phẩm
    if (empty($category_name)) {
        $errors['category_name'] = "Vui lòng nhập tên loại sản phẩm.";
    }

    // Nếu không có lỗi, cập nhật thông tin trong cơ sở dữ liệu
    if (empty($errors)) {
        try {
            $stmt = $conn->prepare("UPDATE categories SET category_name = ?, description = ? WHERE id = ?");
            $stmt->execute([$category_name, $description, $category_id]);

            $_SESSION['message'] = "Cập nhật loại sản phẩm thành công!";
            header("Location: category_list.php");
            exit;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật loại sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="d-flex">
        <?php include 'sidebar.php'; ?>

        <!-- Content -->
        <div class="flex-grow-1 p-4" id="content">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>CẬP NHẬT LOẠI SẢN PHẨM</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Sửa loại sản phẩm</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <!-- Edit Category Form -->
            <div class="card">
                <div class="card-body">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= htmlspecialchars($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST" class="mt-3">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" id="categoryName" name="category_name" value="<?= htmlspecialchars($category['category_name']) ?>" required>
                            <?php if (isset($errors['category_name'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($errors['category_name']) ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Thêm input mô tả -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($category['description']) ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="category_list.php" class="btn btn-secondary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
