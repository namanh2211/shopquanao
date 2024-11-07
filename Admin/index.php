<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
            <!-- Navbar -->
            <div class="d-flex justify-content-between align-items-center">
                <h2>THỐNG KÊ</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <a href="#" class="text-decoration-none">Library</a>
                </div>
                <div class="avatar bg-warning rounded-circle"></div>
            </div>

            <!-- Stats Cards -->
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body text-center">
                            <h5><i class="bi bi-people-fill"></i> 5</h5>
                            <p>Người dùng</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body text-center">
                            <h5><i class="bi bi-list-ul"></i> 4</h5>
                            <p>Loại sản phẩm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body text-center">
                            <h5><i class="bi bi-cup"></i> 24</h5>
                            <p>Sản phẩm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white">
                        <div class="card-body text-center">
                            <h5><i class="bi bi-chat-dots"></i> 5</h5>
                            <p>Đơn hàng</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Thống kê sản phẩm theo loại</h5>
                            <div class="chart-placeholder">
                                <!-- Placeholder for Pie Chart -->
                                <p class="text-center">Biểu đồ tròn</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>5 sản phẩm được mua hàng nhiều nhất</h5>
                            <div class="chart-placeholder">
                                <!-- Placeholder for Bar Chart -->
                                <p class="text-center">Biểu đồ cột</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>