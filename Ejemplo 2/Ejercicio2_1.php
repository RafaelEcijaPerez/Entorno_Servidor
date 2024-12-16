<?php
/*Ejercicio Completo: Sistema de Gestión de Biblioteca
Contexto
Vas a desarrollar un sistema básico para gestionar una biblioteca. Este sistema debe permitir:

Gestionar libros.
Gestionar usuarios (lectores).
Permitir a los usuarios tomar y devolver libros.
Requisitos
Clases necesarias:

Clase Book:
Propiedades: titulo, autor, isbn y disponible (booleano).
Métodos:
__construct($titulo, $autor, $isbn, $disponible = true): Inicializa un libro.
getDetails(): Devuelve un string con la información del libro.
isdisponible(): Devuelve si el libro está disponible.

Clase User:
Propiedades: name, email, y un array borrowedBooks (libros prestados).
Métodos:
__construct($name, $email): Inicializa un usuario.
borrowBook($book): Añade un libro al array borrowedBooks si está disponible.
returnBook($book): Devuelve un libro, marcándolo como disponible.
getBorrowedBooks(): Devuelve la lista de libros prestados.

Clase Library:
Propiedades: name, books (array de libros disponibles), y users (array de usuarios registrados).
Métodos:
__construct($name): Inicializa la biblioteca.
addBook($book): Agrega un libro al inventario.
registerUser($user): Registra un usuario.
listBooks(): Muestra todos los libros disponibles.
listUsers(): Muestra todos los usuarios registrados.
Operaciones:

Crear una biblioteca con un nombre.
Añadir varios libros a la biblioteca.
Registrar varios usuarios.
Permitir a los usuarios tomar y devolver libros.
Mostrar la lista de libros disponibles y los libros que cada usuario tiene prestados.*/

//clase libros

// Clase Book
class Book
{
    public string $title;
    public string $author;
    public string $isbn;
    private bool $available;

    public function __construct(string $title, string $author, string $isbn, bool $available = true)
    {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->available = $available;
    }

    public function getDetails(): string
    {
        return "{$this->title} by {$this->author} (ISBN: {$this->isbn})";
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function borrow(): void
    {
        $this->available = false;
    }

    public function return(): void
    {
        $this->available = true;
    }
}

// Clase User
class User
{
    public string $name;
    public string $email;
    private array $borrowedBooks = [];

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getusuarios()
    {
        return [
            $this->name,
            $this->email
        ];
    }

    public function borrowBook(Book $book): string
    {
        if ($book->isAvailable()) {
            $this->borrowedBooks[] = $book;
            $book->borrow();
            return "Book '{$book->title}' borrowed successfully.";
        }
        return "Book '{$book->title}' is not available.";
    }

    public function returnBook(Book $book): string
    {
        foreach ($this->borrowedBooks as $key => $borrowedBook) {
            if ($borrowedBook === $book) {
                unset($this->borrowedBooks[$key]);
                $book->return();
                return "Book '{$book->title}' returned successfully.";
            }
        }
        return "Book '{$book->title}' was not borrowed by this user.";
    }

    public function getBorrowedBooks(): array
    {
        return $this->borrowedBooks;
    }
}

// Clase Library
class Library
{
    public string $name;
    private array $books = [];
    private array $users = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function registerUser(User $user): void
    {
        $this->users[] = $user;
    }

    public function getUsers(): array
    {
        return $this->users;
    }


    public function listBooks(): void
    {
        echo "Books in {$this->name}:\n";
        foreach ($this->books as $book) {
            $status = $book->isAvailable() ? "Available" : "Borrowed";
            echo "- {$book->getDetails()} [Status: $status]\n";
        }
    }

    public function getBooks(): array
    {
        return $this->books;
    }
}

// Ejemplo de uso
$library = new Library("City Library");

// Añadir libros
$library->addBook(new Book("1984", "George Orwell", "9780451524935"));
$library->addBook(new Book("To Kill a Mockingbird", "Harper Lee", "9780061120084"));
$library->addBook(new Book("The Great Gatsby", "F. Scott Fitzgerald", "9780743273565"));

// Registrar usuarios
$user1 = new User("Alice", "alice@example.com");
$user2 = new User("Bob", "bob@example.com");
$library->registerUser($user1);
$library->registerUser($user2);

// Usuario toma libros
$books = $library->getBooks(); // Usa el método getter
$user1->borrowBook($books[0]) . "\n";
$user2->borrowBook($books[1]) . "\n";
$user1->borrowBook($books[1]) . "\n"; // No disponible


// Usuario devuelve libros
$user1->returnBook($books[0]) . "\n";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Books</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Books in <?= $library->name ?></h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($library->getBooks() as $book): ?>
                <tr>
                    <td><?= htmlspecialchars($book->title) ?></td>
                    <td><?= htmlspecialchars($book->author) ?></td>
                    <td><?= htmlspecialchars($book->isbn) ?></td>
                    <td><?= $book->isAvailable() ? "Available" : "Borrowed" ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 style="text-align: center;">Registered Users</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($library->getUsers() as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user->name) ?></td>
                    <td><?= htmlspecialchars($user->email) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>