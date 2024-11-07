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
        <?php
            include 'sidebar.php';
        ?>

        <!-- Content -->
        <div class="flex-grow-1 p-4" id="content">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>QUẢN LÝ BÌNH LUẬN</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Danh sách bình luận</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <!-- Comment Management -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Quản lý bình luận</h5>
                    <table class="table table-bordered mt-3" id="commentTable">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Tên người dùng</th>
                                <th>Nội dung</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Áo thun nam</td>
                                <td>Nguyễn Văn A</td>
                                <td>Áo này rất đẹp!</td>
                                <td>2024-11-04 10:00</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="deleteComment(this)">Xóa</button>
                                    <button class="btn btn-secondary btn-sm" onclick="toggleVisibility(this)">Ẩn</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Quần jeans nữ</td>
                                <td>Trần Thị B</td>
                                <td>Chất lượng tuyệt vời!</td>
                                <td>2024-11-04 11:00</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="deleteComment(this)">Xóa</button>
                                    <button class="btn btn-secondary btn-sm" onclick="toggleVisibility(this)">Ẩn</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Giày thể thao nam</td>
                                <td>Nguyễn Văn C</td>
                                <td>Rất thoải mái khi đi!</td>
                                <td>2024-11-04 12:00</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="deleteComment(this)">Xóa</button>
                                    <button class="btn btn-secondary btn-sm" onclick="toggleVisibility(this)">Ẩn</button>
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