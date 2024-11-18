<?php
session_start();
include 'database.php'; // Kết nối cơ sở dữ liệu

// Lấy dữ liệu người dùng từ cơ sở dữ liệu
$stmt = $conn->query("SELECT * FROM users"); // Lấy tất cả người dùng
?>

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
        include 'sidebar.php'; // Giao diện sidebar
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
                                <th>Vai trò</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                                    <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                                    <td>
                                        <?php echo $user['role'] == 1 ? 'Admin' : 'Người dùng'; ?>
                                    </td>
                                    <td>
                                        <a href="./edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="./delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</a>
                                        <a href="./reset_password.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Đặt lại mật khẩu</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
