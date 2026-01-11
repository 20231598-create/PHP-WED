<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Đăng ký thẻ thư viện</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<a href="../index.php" class="back-btn">⬅ Quay về menu</a>
<h2>Đăng ký thẻ thư viện</h2>

<form method="post" action="member_result.php">
    <label>Họ tên</label>
    <input type="text" name="name">

    <label>Email</label>
    <input type="email" name="email">

    <label>Số điện thoại</label>
    <input type="text" name="phone">

    <label>Ngày sinh</label>
    <input type="date" name="dob">

    <label>Giới tính</label>
    <select name="gender">
        <option>Nam</option>
        <option>Nữ</option>
        <option>Khác</option>
    </select>

    <label>Địa chỉ</label>
    <textarea name="address"></textarea>

    <button type="submit">Đăng ký</button>
</form>

</body>
</html>
