<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm loại sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" id="sidebar" style="width: 250px;">
            <h3 class="text-center">Matrix Admin</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="./index.php">Thống kê</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" href="./category_list.php">Loại sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./product_list.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./user_list.php">Người dùng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./payments_list.php">Thanh Toán</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./orders_list.php">Đơn hàng</a>
                </li>
            </ul>
        </div>

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

            <!-- Add Category Form -->
            <div class="card">
                <div class="card-body">
                    <form action="save_category.php" method="POST" class="mt-3">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" id="categoryName" name="category_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Hiển thị">Hiển thị</option>
                                <option value="Ẩn">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        <a href="category_list.php" class="btn btn-secondary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
