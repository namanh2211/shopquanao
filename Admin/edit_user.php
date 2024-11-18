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
$old_data = [];

// Lấy dữ liệu người dùng từ cơ sở dữ liệu
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    $_SESSION['message'] = "Không tìm thấy người dùng.";
    header("Location: user_list.php");
    exit;
}

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $role = $_POST['role'] ?? '';

    // Kiểm tra trường tên đầy đủ
    if (empty($name)) {
        $errors['name'] = "Vui lòng nhập tên đầy đủ.";
    }

    // Kiểm tra trường vai trò
    if (!in_array($role, ['0', '1'])) {
        $errors['role'] = "Vui lòng chọn vai trò hợp lệ.";
    }

    // Nếu không có lỗi, cập nhật thông tin trong cơ sở dữ liệu
    if (empty($errors)) {
        try {
            $stmt = $conn->prepare("UPDATE users SET full_name = ?, role = ? WHERE id = ?");
            $stmt->execute([$name, $role, $user_id]);

            $_SESSION['message'] = "Cập nhật thông tin người dùng thành công!";
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
    <title>Chỉnh sửa người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="d-flex">
        <?php include 'sidebar.php'; ?>

        <!-- Content -->
        <div class="flex-grow-1 p-4" id="content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>CHỈNH SỬA NGƯỜI DÙNG</h2>
                <div>
                    <a href="#" class="me-3 text-decoration-none">Trang chủ</a>
                    <span> > Chỉnh sửa người dùng</span>
                </div>
                <div class="avatar bg-warning rounded-circle" style="width: 40px; height: 40px;"></div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= htmlspecialchars($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên đầy đủ</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user['full_name']) ?>">
                            <?php if (isset($errors['name'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($errors['name']) ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Quyền người dùng</label>
                            <select class="form-control" id="role" name="role">
                                <option value="0" <?= ($user['role'] == 0) ? 'selected' : '' ?>>Người dùng</option>
                                <option value="1" <?= ($user['role'] == 1) ? 'selected' : '' ?>>Admin</option>
                            </select>
                            <?php if (isset($errors['role'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($errors['role']) ?></div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="user_list.php" class="btn btn-secondary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
