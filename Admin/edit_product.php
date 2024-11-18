<?php
session_start();
include 'database.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem có ID sản phẩm trong URL hay không
if (!isset($_GET['id'])) {
    $_SESSION['message'] = "Không tìm thấy sản phẩm.";
    header("Location: product_list.php");
    exit;
}

// Lấy danh sách danh mục từ cơ sở dữ liệu
$sql = "SELECT * FROM categories"; // Thay `categories` bằng bảng chứa các danh mục của bạn
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$product_id = $_GET['id'];

// Lấy thông tin sản phẩm từ cơ sở dữ liệu
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    $_SESSION['message'] = "Sản phẩm không tồn tại.";
    header("Location: product_list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
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
                <h2>CẬP NHẬT SẢN PHẨM</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Cập nhật sản phẩm</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <!-- Edit Product Form -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="save_edit_product.php" method="POST" class="mt-3" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="productName" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required>
                        </div>

                        <!-- Mô tả sản phẩm -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required><?= htmlspecialchars($product['description']) ?></textarea>
                        </div>

                        <!-- Danh mục -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Danh mục</label>
                            <select class="form-control" id="category" name="category_id">
                                <option value="">Chọn danh mục</option>
                                <?php
                                // Hiển thị các danh mục từ cơ sở dữ liệu
                                foreach ($categories as $category) {
                                    // Kiểm tra nếu danh mục hiện tại là của loại nào thì chọn nó
                                    $selected = $product['category_id'] == $category['id'] ? 'selected' : '';
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
                            <!-- Hiển thị giá trị price -->
                            <input type="number" class="form-control" id="price" name="price" value="<?= round($product['price'], 0) ?>" required>
                        </div>


                        <!-- Số lượng trong kho -->
                        <div class="mb-3">
                            <label for="stock" class="form-label">Số lượng trong kho</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="<?= htmlspecialchars($product['stock']) ?>" required>
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Chọn hình ảnh mới nếu muốn thay đổi.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                        <a href="product_list.php" class="btn btn-secondary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>