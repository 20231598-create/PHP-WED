<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Thêm sách</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Thêm sách</h2>

<form method="post" action="index.php?c=books&a=store">
    <p>Tiêu đề: <input name="title" required></p>
    <p>Tác giả: <input name="author" required></p>
    <p>Giá: <input type="number" name="price" value="0"></p>
    <p>Số lượng: <input type="number" name="qty" value="0"></p>
    <button>Lưu</button>
</form>

</body>
</html>
