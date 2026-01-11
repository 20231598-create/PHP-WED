<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Không truy cập trực tiếp! <a href='register_member.php'>Quay lại</a>";
    exit;
}

$errors = [];

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$dob = $_POST['dob'] ?? '';
$gender = $_POST['gender'] ?? '';
$address = trim($_POST['address'] ?? '');

if ($name === '') $errors[] = "Họ tên bắt buộc";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email không hợp lệ";
if (!preg_match('/^[0-9]{9,11}$/', $phone)) $errors[] = "SĐT phải 9–11 số";
if ($dob === '') $errors[] = "Ngày sinh bắt buộc";

if ($errors) {
    echo "<h3>Lỗi:</h3><ul>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul><a href='register_member.php'>Quay lại</a>";
    exit;
}

$line = [$name, $email, $phone, $dob, $gender, $address];
$file = fopen("../data/members.csv", "a");
fputcsv($file, $line);
fclose($file);

function e($v) { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }
?>
<h2>Đăng ký thành công</h2>
<p>Họ tên: <?=e($name)?></p>
<p>Email: <?=e($email)?></p>
<p>SĐT: <?=e($phone)?></p>
<p>Ngày sinh: <?=e($dob)?></p>
<p>Giới tính: <?=e($gender)?></p>
<p>Địa chỉ: <?=e($address)?></p>
