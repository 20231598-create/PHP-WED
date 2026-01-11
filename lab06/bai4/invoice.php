<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hóa đơn bán hàng</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<a href="../index.php" class="back-btn">⬅ Quay về menu</a>
<h2>Hóa đơn bán hàng</h2>

<form method="post">
    <label>Tên khách hàng</label>
    <input name="name">

    <label>Số điện thoại</label>
    <input name="phone">

    <h3>Danh sách hàng</h3>

    <?php for($i=0;$i<3;$i++): ?>
        <label>Tên hàng</label>
        <input name="item[]">

        <label>Số lượng</label>
        <input type="number" name="qty[]">

        <label>Đơn giá</label>
        <input type="number" name="price[]">
    <?php endfor ?>

    <label>Giảm giá (%)</label>
    <input type="number" name="discount">

    <label>VAT (%)</label>
    <input type="number" name="vat">

    <button>Tạo hóa đơn</button>
</form>

</body>
</html>
