<?php
$id = $_POST['id'] ?? '';
$date = $_POST['date'] ?? '';

$borrows = json_decode(file_get_contents("../data/borrows.json"), true) ?? [];
$books = json_decode(file_get_contents("../data/books.json"), true) ?? [];

foreach ($borrows as &$br) {
    if ($br['id'] == $id && $br['status'] === 'Đang mượn') {
        $br['status'] = 'Đã trả';
        foreach ($books as &$bk) {
            if ($bk['id'] === $br['book']) $bk['qty']++;
        }
        file_put_contents("../data/borrows.json", json_encode($borrows, JSON_PRETTY_PRINT));
        file_put_contents("../data/books.json", json_encode($books, JSON_PRETTY_PRINT));
        echo "Trả sách thành công";
        exit;
    }
}
echo "Phiếu không hợp lệ";
