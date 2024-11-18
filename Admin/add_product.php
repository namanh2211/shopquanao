<?php
session_start();

// Nhúng file kết nối cơ sở dữ liệu
include 'database.php';

// Lấy danh sách danh mục từ cơ sở dữ liệu
$sql = "SELECT * FROM categories"; // Thay `categories` bằng bảng chứa các danh mục của bạn
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>THÊM SẢN PHẨM MỚI</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Thêm sản phẩm</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <!-- Add Product Form -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="save_add_product.php" method="POST" class="mt-3" enctype="multipart/form-data">
                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="productName" name="product_name"
                                value="<?php echo isset($_SESSION['old_data']['product_name']) ? $_SESSION['old_data']['product_name'] : ''; ?>">
                            <?php if (isset($_SESSION['errors']['product_name'])): ?>
                                <div class="text-danger"><?php echo $_SESSION['errors']['product_name']; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Mô tả sản phẩm -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="description" name="description" rows="4">
                                <?php echo isset($_SESSION['old_data']['description']) ? $_SESSION['old_data']['description'] : ''; ?>
                            </textarea>
                            <?php if (isset($_SESSION['errors']['description'])): ?>
                                <div class="text-danger"><?php echo $_SESSION['errors']['description']; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Danh mục -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Danh mục</label>
                            <select class="form-control" id="category" name="category_id">
                                <option value="">Chọn danh mục</option>
                                <?php
                                // Hiển thị các danh mục từ cơ sở dữ liệu
                                foreach ($categories as $category) {
                                    $selected = isset($_SESSION['old_data']['category_id']) && $_SESSION['old_data']['category_id'] == $category['id'] ? 'selected' : '';
                                    echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['category_name'] . '</option>';
                                }
                                ?>
                            </select>
                            <?php if (isset($_SESSION['errors']['category_id'])): ?>
                                <div class="text-danger"><?php echo $_SESSION['errors']['category_id']; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Giá sản phẩm -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="<?php echo isset($_SESSION['old_data']['price']) ? $_SESSION['old_data']['price'] : ''; ?>">
                            <?php if (isset($_SESSION['errors']['price'])): ?>
                                <div class="text-danger"><?php echo $_SESSION['errors']['price']; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Số lượng sản phẩm -->
                        <div class="mb-3">
                            <label for="stock" class="form-label">Số lượng trong kho</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                value="<?php echo isset($_SESSION['old_data']['stock']) ? $_SESSION['old_data']['stock'] : ''; ?>">
                            <?php if (isset($_SESSION['errors']['stock'])): ?>
                                <div class="text-danger"><?php echo $_SESSION['errors']['stock']; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <?php if (isset($_SESSION['errors']['image'])): ?>
                                <div class="text-danger"><?php echo $_SESSION['errors']['image']; ?></div>
                            <?php endif; ?>
                        </div>

                        <?php
                        // Xóa thông tin trong $_SESSION sau khi đã sử dụng
                        unset($_SESSION['errors']);
                        unset($_SESSION['old_data']);

                        ?>

                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                        <a href="product_list.php" class="btn btn-secondary">Quay lại</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>