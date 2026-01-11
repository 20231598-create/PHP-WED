<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Mượn sách</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<a href="../index.php" class="back-btn">⬅ Quay về menu</a>
<h2>Phiếu mượn sách</h2>

<form method="post" action="borrow_process.php">
    <label>Mã thành viên</label>
    <input name="member">

    <label>Mã sách</label>
    <input name="book">

    <label>Ngày mượn</label>
    <input type="date" name="date">

    <label>Số ngày mượn</label>
    <input type="number" name="days" min="1" max="30">

    <button>Mượn sách</button>
</form>

</body>
</html>
