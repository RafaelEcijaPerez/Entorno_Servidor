<?php
class Book {
    public string $title;
    public string $author;
    public int $pages;

    public function __construct(string $title, string $author, int $pages)
    {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
    }
}

class Library {
    private array $collection = [];

    // Método para agregar un libro
    public function addBook(Book $book): void
    {
        $this->collection[] = $book;
    }

    // Método para eliminar un libro por título
    public function removeBook(string $title): bool
    {
        foreach ($this->collection as $index => $book) {
            if ($book->title === $title) {
                unset($this->collection[$index]);
                $this->collection = array_values($this->collection); // Reindexar el array
                return true;
            }
        }
        return false;
    }

    // Método para listar todos los libros
    public function listBooks(): array
    {
        return $this->collection;
    }
}

// Crear la biblioteca
$library = new Library();

// Crear algunos libros
$book1 = new Book('1984', 'George Orwell', 328);
$book2 = new Book('To Kill a Mockingbird', 'Harper Lee', 281);
$book3 = new Book('Brave New World', 'Aldous Huxley', 268);

// Agregar libros a la biblioteca
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

// Eliminar un libro
$library->removeBook('1984');

// Obtener la lista de libros
$books = $library->listBooks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            max-width: 800px;
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Library Collection</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Pages</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $book->title ?></td>
                        <td><?= $book->author ?></td>
                        <td><?= $book->pages ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No books in the library</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
