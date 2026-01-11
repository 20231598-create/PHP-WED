<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') exit("Không truy cập trực tiếp");

$m = trim($_POST['member'] ?? '');
$b = trim($_POST['book'] ?? '');
$d = $_POST['date'] ?? '';
$days = (int)($_POST['days'] ?? 0);
$err = [];

$members = file("../data/members.csv", FILE_IGNORE_NEW_LINES);
$member_ok = false;
foreach ($members as $line) {
    if (str_getcsv($line)[0] === $m) $member_ok = true;
}
if (!$member_ok) $err[] = "Thành viên không tồn tại";

$books = json_decode(file_get_contents("../data/books.json"), true) ?? [];
$book_index = -1;
foreach ($books as $i => $bk) {
    if ($bk['id'] === $b && $bk['qty'] > 0) $book_index = $i;
}
if ($book_index < 0) $err[] = "Sách không tồn tại hoặc hết";

if ($days < 1 || $days > 30) $err[] = "Số ngày mượn sai";

if ($err) {
    foreach ($err as $e) echo $e."<br>";
    exit;
}

$borrow = json_decode(@file_get_contents("../data/borrows.json"), true) ?? [];
$id = time();
$borrow[] = [
    'id'=>$id,
    'member'=>$m,
    'book'=>$b,
    'borrow_date'=>$d,
    'due_date'=>date('Y-m-d', strtotime("$d +$days days")),
    'status'=>'Đang mượn'
];

$books[$book_index]['qty']--;

file_put_contents("../data/borrows.json", json_encode($borrow, JSON_PRETTY_PRINT));
file_put_contents("../data/books.json", json_encode($books, JSON_PRETTY_PRINT));

echo "Mượn thành công. Mã phiếu: $id";
