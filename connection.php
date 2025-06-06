<?php
error_reporting(0);

//Connection
$databaseHost = 'localhost';
$databaseName = 'skill_test_db';
$databaseUsername = 'root';
$databasePassword = '';
$connection = mysqli_connect('localhost', 'root', '', 'skill_test_db');
if ($connection) {
    echo "Connected to Database";
    echo "</br>";
}

//Code backend

//Retrieve Books
function getBooks($connection)
{
    $query = "SELECT * FROM books";
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$query = "SELECT * FROM books";
$result = mysqli_query($connection, $query);
$get_book_result = mysqli_fetch_all($result, MYSQLI_ASSOC);



//Get search data

if (isset($_GET['search_book_btn'])) {
    $search = $_GET['search_book'];
    $books = mysqli_query($connection, "SELECT * FROM books WHERE book_isbn = '$search'");
    if (mysqli_num_rows($books) == 0) {
        echo "<script>alert('No Book Found');</script>";
    } else {
        $books = mysqli_fetch_all($books, MYSQLI_ASSOC);
    }
}


if (isset($_POST["add_books_btn"])) {

    $book_name = $_POST['book_name'];
    $book_isbn = $_POST['book_isbn'];
    $book_author = $_POST['book_author'];
    $book_date = $_POST['book_date'];


    //Check for duplicate isbn

    $query = "INSERT INTO books (book_name, book_isbn, book_author, book_date) VALUES ('$book_name', '$book_isbn', '$book_author', '$book_date')";
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Book Added Successfully');</script>";
    } else {
        echo "<script>alert('Book Not Added');</script>";
    }
}

if (isset($_POST["edit_books_btn"])) {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $book_isbn = $_POST['book_isbn'];
    $book_author = $_POST['book_author'];
    $book_date = $_POST['book_date'];


    //Check for duplicate isbn

    $query = "UPDATE books SET book_name = '$book_name', book_isbn = '$book_isbn', book_author = '$book_author', book_date = '$book_date' WHERE book_id = '$book_id'";
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Book Editted Successfully');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Book Not Edited');</script>";
    }
}


if (isset($_POST["delete_books_btn"])) {
    $book_id = $_POST['book_id'];
    $query = "DELETE FROM books WHERE book_id = '$book_id'";
    if (mysqli_query($connection, $query)) {
        $books = null;
        echo "<script>alert('Book Deleted Successfully');</script>";
    } else {
        echo "<script>alert('Book Not Deleted');</script>";
    }
}
