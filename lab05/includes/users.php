<?php
$users = [
    'admin' => [
        'hash' => password_hash('123', PASSWORD_DEFAULT),
        'role' => 'admin'
    ],
    'khachhang' => [
        'hash' => password_hash('123', PASSWORD_DEFAULT),
        'role' => 'user'
    ]
];
