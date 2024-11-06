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
                <h2>QUẢN LÝ LOẠI SẢN PHẨM</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Danh sách loại sản phẩm</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="add_category.php" class="btn btn-success">Thêm Loại Sản Phẩm</a>
            </div>

            <!-- Product Category Table -->
            <div class="card">
                <div class="card-body">
                    <h5>Danh sách loại sản phẩm</h5>
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Giả sử đây là dữ liệu được lấy từ cơ sở dữ liệu -->
                            <tr>
                                <td>1</td>
                                <td>Áo thun</td>
                                <td>Mô tả về áo thun</td>
                                <td>Hiển thị</td>
                                <td>2024-11-05 14:30</td>
                                <td>
                                    <a href="/edit_catrgory.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Quần jeans</td>
                                <td>Mô tả về quần jeans</td>
                                <td>Hiển thị</td>
                                <td>2024-11-06 09:00</td>
                                <td>
                                    <a href="/edit_catrgory.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>