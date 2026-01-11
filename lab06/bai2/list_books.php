<?php
$file = __DIR__ . "/../data/books.json";

$books = [];
if (file_exists($file)) {
    $books = json_decode(file_get_contents($file), true);
    if (!is_array($books)) {
        $books = [];
    }
}

function e($v) {
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}
?>
<table border="1">
<tr>
    <th>Mã</th>
    <th>Tên</th>
    <th>Tác giả</th>
    <th>Năm</th>
    <th>Thể loại</th>
    <th>SL</th>
</tr>

<?php if ($books): ?>
    <?php foreach ($books as $b): ?>
    <tr>
        <td><?= e($b['id']) ?></td>
        <td><?= e($b['title']) ?></td>
        <td><?= e($b['author']) ?></td>
        <td><?= e($b['year']) ?></td>
        <td><?= e($b['category']) ?></td>
        <td><?= e($b['qty']) ?></td>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6">Chưa có sách nào</td>
    </tr>
<?php endif; ?>

</table>
