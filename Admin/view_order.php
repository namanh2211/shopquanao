<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
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
                <h2>CHI TIẾT ĐƠN HÀNG</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Chi Tiết Đơn Hàng</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <!-- View Order -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Chi tiết đơn hàng #1</h5>

                    <!-- Order Details -->
                    <div class="mb-3">
                        <strong>ID Đơn Hàng:</strong> 1
                    </div>
                    <div class="mb-3">
                        <strong>ID Người Dùng:</strong> 101
                    </div>
                    <div class="mb-3">
                        <strong>Ngày Đặt Hàng:</strong> 2024-11-01
                    </div>
                    <div class="mb-3">
                        <strong>Trạng Thái Đơn Hàng:</strong> Đã hoàn tất
                    </div>
                    <div class="mb-3">
                        <strong>Tổng Số Tiền:</strong> 1,500,000 VND
                    </div>

                    <!-- Shipping Address -->
                    <div class="mb-3">
                        <strong>Địa Chỉ Giao Hàng:</strong>
                        <p>123 Đường ABC, Quận 1, TP.HCM</p>
                    </div>

                    <!-- Products Ordered -->
                    <h6>Sản phẩm đã đặt:</h6>
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Giá</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Áo Thun Nam</td>
                                <td>2</td>
                                <td>300,000 VND</td>
                                <td>600,000 VND</td>
                            </tr>
                            <tr>
                                <td>Quần Jean</td>
                                <td>1</td>
                                <td>400,000 VND</td>
                                <td>400,000 VND</td>
                            </tr>
                            <tr>
                                <td>Giày Thể Thao</td>
                                <td>1</td>
                                <td>500,000 VND</td>
                                <td>500,000 VND</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Payment Information -->
                    <div class="mb-3">
                        <strong>Phương Thức Thanh Toán:</strong> Thẻ tín dụng
                    </div>
                    <div class="mb-3">
                        <strong>Ngày Thanh Toán:</strong> 2024-11-01
                    </div>

                    <!-- Actions -->
                    <a href="./edit_order.php" class="btn btn-primary">Sửa Đơn Hàng</a>
                    <a href="./orders_list.php" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>
                </div>
            </div>



        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>