<?php
session_start();
include 'database.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem có ID người dùng trong URL hay không
if (!isset($_GET['id'])) {
    $_SESSION['message'] = "Không tìm thấy người dùng.";
    header("Location: user_list.php");
    exit;
}

$user_id = $_GET['id'];
$errors = [];

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Kiểm tra mật khẩu mới
    if (empty($new_password)) {
        $errors['new_password'] = "Vui lòng nhập mật khẩu mới.";
    }
    if ($new_password !== $confirm_password) {
        $errors['confirm_password'] = "Mật khẩu xác nhận không khớp.";
    }

    // Nếu không có lỗi, cập nhật mật khẩu trong cơ sở dữ liệu
    if (empty($errors)) {
        try {
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->execute([$hashed_password, $user_id]);

            $_SESSION['message'] = "Đặt lại mật khẩu thành công!";
            header("Location: user_list.php");
            exit;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="d-flex">
        <?php include 'sidebar.php'; ?>

        <!-- Content -->
        <div class="flex-grow-1 p-4" id="content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>ĐẶT LẠI MẬT KHẨU CỦA NGƯỜI DÙNG ID <?= htmlspecialchars($user_id) ?></h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Đặt lại mật khẩu</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" value="<?= htmlspecialchars($new_password ?? '') ?>">
                            <?php if (isset($errors['new_password'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($errors['new_password']) ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?= htmlspecialchars($confirm_password ?? '') ?>">
                            <?php if (isset($errors['confirm_password'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($errors['confirm_password']) ?></div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
                        <a href="user_list.php" class="btn btn-secondary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
