<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
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
                <h2>QUẢN LÝ NGƯỜI DÙNG</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Danh sách người dùng</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="add_user.php" class="btn btn-success">Thêm Người Dùng</a>
            </div>

            <!-- User Table -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Danh sách người dùng</h5>
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Tên đăng nhập</th>
                                <th>Email</th>
                                <th>Tên đầy đủ</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>nguyenvana</td>
                                <td>vana@example.com</td>
                                <td>Nguyễn Văn A</td>
                                <td>123 Đường ABC, Quận 1, TP.HCM</td>
                                <td>0123456789</td>
                                <td>
                                    <a href="./edit_user.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>tranthib</td>
                                <td>thib@example.com</td>
                                <td>Trần Thị B</td>
                                <td>456 Đường DEF, Quận 2, TP.HCM</td>
                                <td>0987654321</td>
                                <td>
                                    <a href="./edit_user.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>phamquangc</td>
                                <td>quangc@example.com</td>
                                <td>Phạm Quang C</td>
                                <td>789 Đường GHI, Quận 3, TP.HCM</td>
                                <td>0123451234</td>
                                <td>
                                    <a href="./edit_user.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>lethid</td>
                                <td>thid@example.com</td>
                                <td>Lê Thị D</td>
                                <td>101 Đường JKL, Quận 4, TP.HCM</td>
                                <td>0987654322</td>
                                <td>
                                    <a href="./edit_user.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>nguyentrane</td>
                                <td>trane@example.com</td>
                                <td>Nguyễn Trần E</td>
                                <td>102 Đường MNO, Quận 5, TP.HCM</td>
                                <td>0123456788</td>
                                <td>
                                    <a href="./edit_user.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>doanphif</td>
                                <td>phif@example.com</td>
                                <td>Đoàn Phi F</td>
                                <td>103 Đường PQR, Quận 6, TP.HCM</td>
                                <td>0987651234</td>
                                <td>
                                    <a href="./edit_user.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>phamthig</td>
                                <td>thig@example.com</td>
                                <td>Phạm Thị G</td>
                                <td>104 Đường STU, Quận 7, TP.HCM</td>
                                <td>0123456787</td>
                                <td>
                                    <a href="./edit_user.php" class="btn btn-primary btn-sm">Sửa</a>
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