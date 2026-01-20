<?php

class BookRepository {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll($kw = '', $sort = 'id', $dir = 'desc') {

        // whitelist
        $allowedSort = ['id', 'title', 'author', 'price', 'qty', 'created_at'];
        $allowedDir  = ['asc', 'desc'];

        if (!in_array($sort, $allowedSort)) {
            $sort = 'id';
        }
        if (!in_array(strtolower($dir), $allowedDir)) {
            $dir = 'desc';
        }

        $sql = "SELECT * FROM books
                WHERE title LIKE :kw
                   OR author LIKE :kw
                ORDER BY $sort $dir";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'kw' => "%$kw%"
        ]);

        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([(int)$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO books(title, author, price, qty)
             VALUES (:title, :author, :price, :qty)"
        );
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $data['id'] = (int)$id;
        $stmt = $this->pdo->prepare(
            "UPDATE books
             SET title = :title,
                 author = :author,
                 price = :price,
                 qty = :qty
             WHERE id = :id"
        );
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([(int)$id]);
    }
}
