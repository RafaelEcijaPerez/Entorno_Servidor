<?php
class Library {
    public array $books;
    public string $libraryName;

    public function __construct(string $libraryName, array $books = [])
    {
        $this->libraryName = $libraryName;
        $this->books = $books;
    }

    // Método para añadir un libro
    public function addBook(string $title, string $author, int $year): void
    {
        $this->books[] = [
            'title' => $title,
            'author' => $author,
            'year' => $year,
        ];
    }

    // Método para eliminar un libro por título
    public function removeBook(string $title): bool
    {
        foreach ($this->books as $index => $book) {
            if ($book['title'] === $title) {
                unset($this->books[$index]);
                $this->books = array_values($this->books); // Reindexar el array
                return true;
            }
        }
        return false;
    }

    // Método para obtener la lista de libros
    public function getBooks(): array
    {
        return $this->books;
    }
}
// Crear una instancia de la biblioteca
$library = new Library("City Library", [
    ['title' => '1984', 'author' => 'George Orwell', 'year' => 1949],
    ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'year' => 1960],
]);

// Añadir un nuevo libro
$library->addBook('UNA NAVIDAD MUY FUN, FUN, FUN', 'Megan Maxwell', 2024);

// Mostrar la lista de libros
$books = $library->getBooks();

// Eliminar un libro
$library->removeBook('1984');

// Obtener la lista actualizada de libros
$books = $library->getBooks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $library->libraryName ?></title>
    <style>
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
    <h1><?= $library->libraryName ?></h1>
    <h2>List of Books</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $book['title'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td><?= $book['year'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No books available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
