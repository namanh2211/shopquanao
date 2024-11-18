<?php
// Khởi tạo lại thông báo lỗi và dữ liệu cũ từ session (nếu có)
session_start();
$errors = $_SESSION['errors'] ?? [
    'category_name' => '',
    'description' => ''
];
$old_data = $_SESSION['old_data'] ?? ['category_name' => '', 'description' => ''];

// Xóa thông báo lỗi và dữ liệu cũ sau khi đã sử dụng
unset($_SESSION['errors']);
unset($_SESSION['old_data']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="d-flex">
        <?php
        include 'sidebar.php';
        ?>

        <!-- Content -->
        <div class="flex-grow-1 p-4" id="content">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>THÊM DANH MỤC</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Thêm danh mục</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <!-- Add Category Form -->
            <div class="card">
                <div class="card-body">
                    <h5>Thêm danh mục mới</h5>
                    <form action="save_add_category.php" method="POST" class="mt-3">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="category_name" name="category_name"
                                value="<?php echo isset($old_data['category_name']) ? htmlspecialchars($old_data['category_name']) : ''; ?>" >
                            <span class="text-danger"><?php echo isset($errors['category_name']) ? $errors['category_name'] : ''; ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả danh mục</label>
                            <textarea class="form-control" id="description" name="description" rows="4" >
                                <?php echo isset($old_data['description']) ? htmlspecialchars($old_data['description']) : ''; ?>
                            </textarea>
                            <span class="text-danger"><?php echo isset($errors['description']) ? $errors['description'] : ''; ?></span>
                        </div>
                        <button type="submit" class="btn btn-success">Thêm danh mục</button>
                        <a href="category_list.php" class="btn btn-secondary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>