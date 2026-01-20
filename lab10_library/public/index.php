<?php
$pdo = require __DIR__ . '/../app/config/db.php';

$c = $_GET['c'] ?? 'books';
$a = $_GET['a'] ?? 'index';

$controllerName = ucfirst($c) . 'Controller';
$controllerFile = "../app/controllers/$controllerName.php";

if (!file_exists($controllerFile)) {
    die("Controller không tồn tại");
}

require $controllerFile;

$controller = new $controllerName($pdo);

if (!method_exists($controller, $a)) {
    die("Action không tồn tại");
}

$controller->$a();
