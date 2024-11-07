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
        <?php
            include 'sidebar.php';
        ?>

        <!-- Content -->
        <div class="flex-grow-1 p-4" id="content">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>QUẢN LÝ ĐƠN HÀNG</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Danh sách đơn hàng</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <!-- Orders Table -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Danh sách đơn hàng</h5>
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>ID Đơn Hàng</th>
                                <th>ID Người Dùng</th>
                                <th>Ngày Đặt Hàng</th>
                                <th>Tổng Số Tiền</th>
                                <th>Địa Chỉ Giao Hàng</th>
                                <th>Trạng Thái Đơn Hàng</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>101</td>
                                <td>2024-11-01</td>
                                <td>1,500,000 VND</td>
                                <td>123 Đường ABC, Quận 1, TP.HCM</td>
                                <td>Đã hoàn tất</td>
                                <td>
                                    <a href="./view_order.php" class="btn btn-info btn-sm">Xem</a>
                                    <a href="./edit_order.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>102</td>
                                <td>2024-11-02</td>
                                <td>800,000 VND</td>
                                <td>456 Đường DEF, Quận 2, TP.HCM</td>
                                <td>Đang chờ xử lý</td>
                                <td>
                                    <a href="./view_order.php" class="btn btn-info btn-sm">Xem</a>
                                    <a href="./edit_order.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>103</td>
                                <td>2024-11-03</td>
                                <td>2,000,000 VND</td>
                                <td>789 Đường GHI, Quận 3, TP.HCM</td>
                                <td>Đã hủy</td>
                                <td>
                                    <a href="./view_order.php" class="btn btn-info btn-sm">Xem</a>
                                    <a href="./edit_order.php" class="btn btn-primary btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>104</td>
                                <td>2024-11-04</td>
                                <td>1,200,000 VND</td>
                                <td>101 Đường JKL, Quận 4, TP.HCM</td>
                                <td>Đã hoàn tất</td>
                                <td>
                                    <a href="./view_order.php" class="btn btn-info btn-sm">Xem</a>
                                    <a href="./edit_order.php" class="btn btn-primary btn-sm">Sửa</a>
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