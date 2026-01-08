<?php
require_once 'includes/auth.php';
require_login();
require_once 'includes/header.php';

$products = [
    1 => ['name'=>'Áo thun','price'=>100],
    2 => ['name'=>'Quần jean','price'=>200],
    3 => ['name'=>'Giày','price'=>300],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    set_flash('success','Đã thêm vào giỏ');
    header("Location: products.php");
    exit;
}
?>

<h3>Sản phẩm</h3>
<div class="row">
<?php foreach ($products as $id=>$p): ?>
<div class="col-md-4 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5><?= htmlspecialchars($p['name']) ?></h5>
            <p><?= $p['price'] ?>k</p>
            <form method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button class="btn btn-success w-100">Thêm</button>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
