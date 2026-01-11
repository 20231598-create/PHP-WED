<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Trả sách</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<a href="../index.php" class="back-btn">⬅ Quay về menu</a>
<h2>Trả sách</h2>

<form method="post" action="return_process.php">
    <label>Mã phiếu mượn</label>
    <input name="id">

    <label>Ngày trả</label>
    <input type="date" name="date">

    <button>Trả sách</button>
</form>

</body>
</html>
