<?php
session_start();
require_once 'includes/users.php';
require_once 'includes/flash.php';

$error = '';
$remember = $_COOKIE['remember_username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';

    if ($u === '' || $p === '') {
        $error = 'Vui lòng nhập đầy đủ thông tin';
    } elseif (isset($users[$u]) && password_verify($p, $users[$u]['hash'])) {
        $_SESSION['auth'] = true;
        $_SESSION['user'] = [
            'username' => $u,
            'role' => $users[$u]['role']
        ];

        if (!empty($_POST['remember'])) {
            setcookie('remember_username', $u, time()+7*24*60*60, '/');
        }

        set_flash('success', 'Đăng nhập thành công');
        header("Location: dashboard.php");
        exit;
    } else {
        $error = 'Sai tài khoản hoặc mật khẩu';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width:400px;">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="text-center mb-3">🔐 Đăng nhập</h4>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="post">
                <div class="mb-3">
                    <label>Username</label>
                    <input class="form-control" name="username"
                           value="<?= htmlspecialchars($remember) ?>">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember">
                    <label class="form-check-label">Remember me</label>
                </div>

                <button class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
