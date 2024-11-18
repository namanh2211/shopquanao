<?php
session_start();

// Nhúng file kết nối cơ sở dữ liệu
include 'database.php';

// Lấy danh sách sản phẩm và tên danh mục từ cơ sở dữ liệu
$sql = "SELECT products.*, categories.category_name 
        FROM products 
        INNER JOIN categories ON products.category_id = categories.id"; // JOIN giữa products và categories
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
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

            <?php

            if (isset($_SESSION['message'])) {
                echo '<div class="alert alert-success">';
                echo $_SESSION['message'];
                echo '</div>';
                unset($_SESSION['message']); // Xóa thông báo sau khi đã hiển thị
            }
            ?>
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>QUẢN LÝ SẢN PHẨM</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Danh sách sản phẩm</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="add_product.php" class="btn btn-success">Thêm Sản Phẩm</a>
            </div>

            <!-- Search and Filter Options -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">Tìm theo loại</option>
                        <option value="1">Áo</option>
                        <option value="2">Quần</option>
                        <option value="3">Phụ kiện</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">Sắp xếp theo</option>
                        <option value="price">Giá</option>
                        <option value="date">Ngày</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-secondary w-100">Tìm kiếm</button>
                </div>
            </div>

            <!-- Product Table -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Danh sách sản phẩm</h5>
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                            <tr class="text-align-center">
                                <th>ID</th>
                                <th>Tên Sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Hình ảnh</th>
                                <th>Ngày thêm</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 1;
                            foreach ($products as $product): ?> 
                                <tr>
                                    <td><?php echo $stt++; ?></td>
                                    <td><a href="./product_detail.php?id=<?= $product['id']; ?>" class="text-decoration-none"><?= $product['product_name']; ?></a></td>
                                    <td><?= $product['category_name']; ?></td> <!-- Lấy tên danh mục -->
                                    <td>
                                        <?= (str_word_count($product['description']) > 7) ? implode(' ', array_slice(explode(' ', $product['description']), 0, 7)) . '...' : $product['description']; ?>
                                    </td>

                                    <td>$ <?= number_format($product['price'], 0, ',', '.'); ?></td>
                                    <td><?= $product['stock']; ?></td>
                                    <td><img src="uploads/<?= $product['image']; ?>" alt="<?= $product['name']; ?>" width="100"></td>
                                    <td><?= date('d/m/Y', strtotime($product['created_at'])); ?></td>
                                    <td>
                                        <a href="./edit_product.php?id=<?= $product['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                        <button class="btn btn-danger btn-sm" onclick="deleteProduct(<?= $product['id']; ?>)">Xóa</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteProduct(productId) {
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                fetch(`delete_product.php?id=${productId}`, {
                        method: 'GET'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload(); // Tải lại trang để cập nhật danh sách sản phẩm
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>