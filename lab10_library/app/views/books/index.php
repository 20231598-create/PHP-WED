<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sách</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Danh sách sách</h2>

<!-- SEARCH -->
<form method="get">
    <input type="hidden" name="c" value="books">
    <input type="text" name="kw" placeholder="Tìm theo tên / tác giả"
           value="<?= htmlspecialchars($_GET['kw'] ?? '') ?>">
    <button>Tìm</button>
</form>

<p><a href="index.php?c=books&a=create">+ Thêm sách</a></p>

<table border="1" cellpadding="5">
    <tr>
        <th><a href="?c=books&sort=id&dir=asc">ID ↑</a></th>
        <th><a href="?c=books&sort=title&dir=asc">Tiêu đề</a></th>
        <th><a href="?c=books&sort=author&dir=asc">Tác giả</a></th>
        <th><a href="?c=books&sort=price&dir=desc">Giá</a></th>
        <th><a href="?c=books&sort=qty&dir=desc">Số lượng</a></th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($books as $b): ?>
    <tr>
        <td><?= $b['id'] ?></td>
        <td><?= htmlspecialchars($b['title']) ?></td>
        <td><?= htmlspecialchars($b['author']) ?></td>
        <td><?= $b['price'] ?></td>
        <td><?= $b['qty'] ?></td>
        <td>
            <a href="index.php?c=books&a=edit&id=<?= $b['id'] ?>">Sửa</a>
            <form method="post" action="index.php?c=books&a=delete" style="display:inline">
                <input type="hidden" name="id" value="<?= $b['id'] ?>">
                <button onclick="return confirm('Xóa?')">Xóa</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
