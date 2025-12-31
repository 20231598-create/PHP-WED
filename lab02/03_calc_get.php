<?php
/*
BT4: 4 phép tính cơ bản qua URL (GET)
INPUT: a, b, op
OUTPUT: Phép tính và kết quả
*/

// Nếu chưa có GET thì gán mặc định
$a  = $_GET['a'] ?? 10;
$b  = $_GET['b'] ?? 5;
$op = $_GET['op'] ?? '+';

switch ($op) {
    case '+':
        $phep = "Cộng";
        $kq = $a + $b;
        break;
    case '-':
        $phep = "Trừ";
        $kq = $a - $b;
        break;
    case '*':
        $phep = "Nhân";
        $kq = $a * $b;
        break;
    case '/':
        $phep = "Chia";
        $kq = ($b == 0) ? "Không chia được cho 0" : $a / $b;
        break;
    default:
        $phep = "Không hợp lệ";
        $kq = "Lỗi";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
</head>
<body>
<h3>Phép tính:</h3>
<p><b><?= $a ?> <?= $op ?> <?= $b ?></b></p>

<h3>Kết quả:</h3>
<p><b><?= $kq ?></b></p>

<hr>

<p><b>Chọn phép tính khác:</b></p>
<ul>
    <li><a href="?a=10&b=5&op=%2B">10 + 5</a></li>
    <li><a href="?a=10&b=5&op=-">10 - 5</a></li>
    <li><a href="?a=10&b=5&op=*">10 × 5</a></li>
    <li><a href="?a=10&b=5&op=/">10 ÷ 5</a></li>
</ul>

</body>
</html>