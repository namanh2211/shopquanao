<?php
// Nhúng file kết nối cơ sở dữ liệu
include 'database.php';

// Truy vấn dữ liệu từ bảng categories
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý loại sản phẩm</title>
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
                <h2>QUẢN LÝ DANH MỤC</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Danh sách Danh mục</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="add_category.php" class="btn btn-success">Thêm Danh Mục</a>
            </div>

            <!-- Product Category Table -->
            <div class="card">
                <div class="card-body">
                    <h5>Danh sách danh mục</h5>
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                            <tr class="text-align-center">
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Lặp qua danh sách các loại sản phẩm -->
                            <?php
                            $stt = 1;
                            foreach ($categories as $category): ?>
                                <tr>
                                    <td><?php echo $stt++; ?></td>
                                    <td><?php echo htmlspecialchars($category['category_name']); ?></td>
                                    <td>
                                        <?= (str_word_count($category['description']) > 50) ? implode(' ', array_slice(explode(' ', $category['description']), 0, 10)) . '...' : $category['description']; ?>
                                    </td>
                                    <td><?php echo $category['created_at']; ?></td>
                                    <td>
                                        <a href="edit_category.php?id=<?php echo $category['id']; ?>" class="btn btn-primary btn-sm">Sửa</a>
                                        <button class="btn btn-danger btn-sm" onclick="deleteCategory(<?php echo $category['id']; ?>)">Xóa</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Xử lý việc xóa sản phẩm (có thể thông qua AJAX hoặc trang xác nhận)
        function deleteCategory(id) {
            if (confirm('Bạn có chắc chắn muốn xóa loại sản phẩm này?')) {
                window.location.href = 'delete_category.php?id=' + id;
            }
        }
    </script>
</body>

</html>