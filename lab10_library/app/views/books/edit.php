<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"><title>Sửa sách</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Sửa sách</h2>

<form method="post" action="index.php?c=books&a=update">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">
    <p>Tiêu đề: <input name="title" value="<?= htmlspecialchars($book['title']) ?>"></p>
    <p>Tác giả: <input name="author" value="<?= htmlspecialchars($book['author']) ?>"></p>
    <p>Giá: <input type="number" name="price" value="<?= $book['price'] ?>"></p>
    <p>Số lượng: <input type="number" name="qty" value="<?= $book['qty'] ?>"></p>
    <button>Cập nhật</button>
</form>

</body>
</html>
