<!--
Nama: Ahmad Saepudin
NPM: 21552011226
Kelas: TIF RP 221 PA
Pemrograman Web 2 - Semester 6
-->
<?php

// Parent class
class Book {
    protected $title;
    protected $author;
    protected $year;
    protected $status;

    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->status = 'available';
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getYear() {
        return $this->year;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Polymorphism (override)
    public function printDetails() {
        echo "Judul: " . $this->title . "\n";
        echo "Penulis: " . $this->author . "\n";
        echo "Tahun Terbit: " . $this->year . "\n";
        echo "Status: " . $this->status . "\n";
    }
}

// Child class
class Library {
    private static $books = [];

    public static function addBook(Book $book) {
        self::$books[] = $book;
    }

    public static function getBooks() {
        return self::$books;
    }

    public static function printBooks() {
        foreach (self::$books as $book) {
            $book->printDetails();
            echo "\n";
        }
    }
}

// Adding new books
$book1 = new Book("Story Of Muhammad", "ABCD", 2020);
$book2 = new Book("Hujan", "EFGH", 2024);

// Adding books to library
Library::addBook($book1);
Library::addBook($book2);


// Changing book status
$book1->setStatus('Dipinjam');
$book2->setStatus('Tersedia');

// Printing list of books
echo "Informasi Daftar Buku:\n";
Library::printBooks();

?>