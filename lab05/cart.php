<?php
require_once 'includes/auth.php';
require_login();
require_once 'includes/header.php';

$products = [
    1 => ['name'=>'Áo thun','price'=>100],
    2 => ['name'=>'Quần jean','price'=>200],
    3 => ['name'=>'Giày','price'=>300],
];

if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (isset($_POST['clear'])) {
        unset($_SESSION['cart']);
    } else {
        unset($_SESSION['cart'][(int)$_POST['id']]);
    }
    header("Location: cart.php");
    exit;
}

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<h3>Giỏ hàng</h3>

<?php if (!$cart): ?>
<div class="alert alert-warning">Giỏ hàng trống</div>
<?php else: ?>

<table class="table table-bordered bg-white">
<tr><th>Sản phẩm</th><th>SL</th><th>Thành tiền</th><th></th></tr>

<?php foreach ($cart as $id=>$qty):
$sum = $products[$id]['price']*$qty;
$total += $sum;
?>
<tr>
<td><?= htmlspecialchars($products[$id]['name']) ?></td>
<td><?= $qty ?></td>
<td><?= $sum ?>k</td>
<td>
<form method="post">
<input type="hidden" name="id" value="<?= $id ?>">
<button class="btn btn-danger btn-sm">Xóa</button>
</form>
</td>
</tr>
<?php endforeach; ?>

</table>

<b>Tổng tiền: <?= $total ?>k</b>

<form method="post" class="mt-2">
<button name="clear" class="btn btn-outline-danger">Xóa toàn bộ</button>
</form>

<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
