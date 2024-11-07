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
                            <tr>
                                <th>ID</th>
                                <th>Tên Sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Hình ảnh</th>
                                <th>Ngày thêm</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row 1 -->
                            <tr>
                                <td>1</td>
                                <td><a href="#" class="text-decoration-none">Áo sơ mi nam</a></td>
                                <td>Áo</td>
                                <td>Mô tả chi tiết về áo sơ mi nam...</td>
                                <td>200,000₫</td>
                                <td>50</td>
                                <td><img src="path/to/image1.jpg" alt="Áo sơ mi nam" width="50"></td>
                                <td>01/11/2024</td>
                                <td>
                                    <a href="./edit_product.php" class="btn btn-warning btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <!-- Example Row 2 -->
                            <tr>
                                <td>2</td>
                                <td><a href="#" class="text-decoration-none">Quần jean nam</a></td>
                                <td>Quần</td>
                                <td>Mô tả chi tiết về quần jean nam...</td>
                                <td>300,000₫</td>
                                <td>30</td>
                                <td><img src="path/to/image2.jpg" alt="Quần jean nam" width="50"></td>
                                <td>05/11/2024</td>
                                <td>
                                    <a href="./edit_product.php" class="btn btn-warning btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <!-- Example Row 3 -->
                            <tr>
                                <td>3</td>
                                <td><a href="#" class="text-decoration-none">Áo thun nữ</a></td>
                                <td>Áo</td>
                                <td>Mô tả chi tiết về áo thun nữ...</td>
                                <td>150,000₫</td>
                                <td>40</td>
                                <td><img src="path/to/image3.jpg" alt="Áo thun nữ" width="50"></td>
                                <td>10/11/2024</td>
                                <td>
                                    <a href="./edit_product.php" class="btn btn-warning btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <!-- Example Row 4 -->
                            <tr>
                                <td>4</td>
                                <td><a href="#" class="text-decoration-none">Đầm nữ</a></td>
                                <td>Đầm</td>
                                <td>Mô tả chi tiết về đầm nữ...</td>
                                <td>400,000₫</td>
                                <td>20</td>
                                <td><img src="path/to/image4.jpg" alt="Đầm nữ" width="50"></td>
                                <td>15/11/2024</td>
                                <td>
                                    <a href="./edit_product.php" class="btn btn-warning btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <!-- Example Row 5 -->
                            <tr>
                                <td>5</td>
                                <td><a href="#" class="text-decoration-none">Giày thể thao</a></td>
                                <td>Giày</td>
                                <td>Mô tả chi tiết về giày thể thao...</td>
                                <td>500,000₫</td>
                                <td>25</td>
                                <td><img src="path/to/image5.jpg" alt="Giày thể thao" width="50"></td>
                                <td>20/11/2024</td>
                                <td>
                                    <a href="./edit_product.php" class="btn btn-warning btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                            <!-- Example Row 6 -->
                            <tr>
                                <td>6</td>
                                <td><a href="#" class="text-decoration-none">Mũ lưỡi trai</a></td>
                                <td>Phụ kiện</td>
                                <td>Mô tả chi tiết về mũ lưỡi trai...</td>
                                <td>100,000₫</td>
                                <td>60</td>
                                <td><img src="path/to/image6.jpg" alt="Mũ lưỡi trai" width="50"></td>
                                <td>25/11/2024</td>
                                <td>
                                    <a href="./edit_product.php" class="btn btn-warning btn-sm">Sửa</a>
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