<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=lab10_library;charset=utf8mb4",
        "root",
        "", // mật khẩu nếu có
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    return $pdo;
} catch (PDOException $e) {
    die("Không kết nối được CSDL");
}
