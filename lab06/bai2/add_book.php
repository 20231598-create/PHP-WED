<?php
$errors = [];
$file = "../data/books.json";

// Tạo file nếu chưa tồn tại
if (!file_exists($file)) {
    file_put_contents($file, "[]");
}

$books = json_decode(file_get_contents($file), true);
if (!is_array($books)) $books = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id'] ?? '');
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $year = (int)($_POST['year'] ?? 0);
    $category = $_POST['category'] ?? '';
    $qty = (int)($_POST['qty'] ?? -1);

    if ($id === '' || $title === '' || $author === '') {
        $errors[] = "Không được để trống";
    }

    if ($year < 1900 || $year > date('Y')) {
        $errors[] = "Năm không hợp lệ";
    }

    if ($qty < 0) {
        $errors[] = "Số lượng phải >= 0";
    }

    foreach ($books as $b) {
        if ($b['id'] === $id) {
            $errors[] = "Trùng mã sách";
            break;
        }
    }

    if (!$errors) {
        $books[] = [
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'year' => $year,
            'category' => $category,
            'qty' => $qty
        ];

        file_put_contents(
            $file,
            json_encode($books, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        header("Location: list_books.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Thêm sách</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<a href="../index.php" class="back-btn">⬅ Quay về menu</a>

<h2>Thêm sách vào thư viện</h2>

<?php if ($errors): ?>
<div class="error">
<?php foreach ($errors as $e): ?>
<p><?=htmlspecialchars($e)?></p>
<?php endforeach ?>
</div>
<?php endif ?>

<form method="post">
    <label>Mã sách</label>
    <input name="id" value="<?=htmlspecialchars($_POST['id'] ?? '')?>">

    <label>Tên sách</label>
    <input name="title" value="<?=htmlspecialchars($_POST['title'] ?? '')?>">

    <label>Tác giả</label>
    <input name="author" value="<?=htmlspecialchars($_POST['author'] ?? '')?>">

    <label>Năm xuất bản</label>
    <input type="number" name="year" value="<?=htmlspecialchars($_POST['year'] ?? '')?>">

    <label>Thể loại</label>
    <select name="category">
        <?php
        $cats = ["Giáo trình","Kỹ năng","Văn học","Khoa học","Khác"];
        foreach ($cats as $c) {
            $sel = ($c == ($_POST['category'] ?? '')) ? 'selected' : '';
            echo "<option $sel>$c</option>";
        }
        ?>
    </select>

    <label>Số lượng</label>
    <input type="number" name="qty" value="<?=htmlspecialchars($_POST['qty'] ?? '')?>">

    <button>Thêm sách</button>
</form>

</body>
</html>
