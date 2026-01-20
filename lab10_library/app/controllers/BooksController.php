<?php
require "../app/models/BookRepository.php";

class BooksController {

    private $repo;

    public function __construct($pdo) {
        $this->repo = new BookRepository($pdo);
    }

   public function index() {
    $kw   = $_GET['kw']   ?? '';
    $sort = $_GET['sort'] ?? 'id';
    $dir  = $_GET['dir']  ?? 'desc';

    $books = $this->repo->getAll($kw, $sort, $dir);
    require "../app/views/books/index.php";
}


    public function create() {
        require "../app/views/books/create.php";
    }

    public function store() {
        $data = [
            'title'  => trim($_POST['title']),
            'author' => trim($_POST['author']),
            'price'  => (float)$_POST['price'],
            'qty'    => (int)$_POST['qty']
        ];

        if ($data['title'] === '' || $data['author'] === '') {
            die("Dữ liệu không hợp lệ");
        }

        $this->repo->create($data);
        header("Location: index.php?c=books");
        exit;
    }

    public function edit() {
        $id = (int)($_GET['id'] ?? 0);
        $book = $this->repo->find($id);

        if (!$book) {
            die("Không tìm thấy sách");
        }

        require "../app/views/books/edit.php";
    }

    public function update() {
        $id = (int)$_POST['id'];

        $data = [
            'title'  => trim($_POST['title']),
            'author' => trim($_POST['author']),
            'price'  => (float)$_POST['price'],
            'qty'    => (int)$_POST['qty']
        ];

        $this->repo->update($id, $data);
        header("Location: index.php?c=books");
        exit;
    }

    public function delete() {
        $id = (int)$_POST['id'];
        $this->repo->delete($id);
        header("Location: index.php?c=books");
        exit;
    }
}
