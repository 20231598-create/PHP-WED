<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/flash.php';
require_once __DIR__ . '/csrf.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Shop Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">🛒 Shop Demo</a>

        <?php if (is_logged_in()): ?>
        <div class="text-white">
            Xin chào <b><?= htmlspecialchars($_SESSION['user']['username']) ?></b>
            <a class="btn btn-outline-light btn-sm ms-2" href="products.php">Products</a>
            <a class="btn btn-outline-light btn-sm" href="cart.php">Cart</a>

            <form action="logout.php" method="post" class="d-inline">
                <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
                <button class="btn btn-danger btn-sm ms-2">Logout</button>
            </form>
        </div>
        <?php endif; ?>
    </div>
</nav>

<div class="container">
<?php
if ($m = get_flash('success')) echo "<div class='alert alert-success'>$m</div>";
if ($m = get_flash('error'))   echo "<div class='alert alert-danger'>$m</div>";
if ($m = get_flash('info'))    echo "<div class='alert alert-info'>$m</div>";
?>
