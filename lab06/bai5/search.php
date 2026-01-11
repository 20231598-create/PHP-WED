<?php
// Đọc dữ liệu GET
$kw  = trim($_GET['kw'] ?? '');
$cat = $_GET['cat'] ?? 'all';

// Đọc file JSON an toàn
$file = __DIR__ . '/../data/books.json';
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

// Lọc dữ liệu
$results = [];
foreach ($books as $b) {
    if ($kw && stripos($b['title'], $kw) === false) {
        continue;
    }
    if ($cat !== 'all' && $b['category'] !== $cat) {
        continue;
    }
    $results[] = $b;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tìm kiếm sách</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<a href="../index.php" class="back-btn">⬅ Quay về menu</a>

<h2>Tìm kiếm sách</h2>

<form method="get">
    <label>Từ khóa</label>
    <input name="kw" value="<?= e($kw) ?>">

    <label>Thể loại</label>
    <select name="cat">
        <option value="all">Tất cả</option>
        <?php
        $cats = ["Giáo trình","Kỹ năng","Văn học","Khoa học","Khác"];
        foreach ($cats as $c) {
            $sel = ($c === $cat) ? 'selected' : '';
            echo "<option $sel>$c</option>";
        }
        ?>
    </select>

    <button>Tìm</button>
</form>

<hr>

<?php if ($results): ?>
<table>
<tr>
    <th>Mã</th>
    <th>Tên</th>
    <th>Tác giả</th>
    <th>Năm</th>
    <th>Thể loại</th>
    <th>SL</th>
</tr>
<?php foreach ($results as $b): ?>
<tr>
    <td><?= e($b['id']) ?></td>
    <td><?= e($b['title']) ?></td>
    <td><?= e($b['author']) ?></td>
    <td><?= e($b['year']) ?></td>
    <td><?= e($b['category']) ?></td>
    <td><?= e($b['qty']) ?></td>
</tr>
<?php endforeach ?>
</table>
<?php else: ?>
<p>Không tìm thấy kết quả phù hợp.</p>
<?php endif ?>

</body>
</html>
