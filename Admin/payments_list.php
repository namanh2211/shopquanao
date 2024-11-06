<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Thanh Toán</title>
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
                <h2>QUẢN LÝ THANH TOÁN</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Danh sách Thanh Toán</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <!-- Payment Table -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Danh sách thanh toán</h5>
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>ID Thanh Toán</th>
                                <th>ID Đơn Hàng</th>
                                <th>Ngày Thanh Toán</th>
                                <th>Số Tiền</th>
                                <th>Phương Thức Thanh Toán</th>
                                <th>Trạng Thái Thanh Toán</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>101</td>
                                <td>2024-11-01</td>
                                <td>1,000,000 VND</td>
                                <td>Thẻ tín dụng</td>
                                <td>Đã hoàn tất</td>
                                <td>
                                    <a href="./edit_payment.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>102</td>
                                <td>2024-11-02</td>
                                <td>500,000 VND</td>
                                <td>Paypal</td>
                                <td>Đang chờ xử lý</td>
                                <td>
                                    <a href="./edit_payment.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>103</td>
                                <td>2024-11-03</td>
                                <td>2,000,000 VND</td>
                                <td>Thanh toán khi nhận hàng</td>
                                <td>Đã hoàn tất</td>
                                <td>
                                    <a href="./edit_payment.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>104</td>
                                <td>2024-11-04</td>
                                <td>1,500,000 VND</td>
                                <td>Thẻ tín dụng</td>
                                <td>Thất bại</td>
                                <td>
                                    <a href="./edit_payment.php" class="btn btn-primary btn-sm">Sửa</a>
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