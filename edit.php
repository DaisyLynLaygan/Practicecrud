<?php
require_once 'connection.php';
$book_id = $_GET['id'];
$book = mysqli_query($connection, "SELECT * FROM books WHERE book_id = '$book_id'");
$book = mysqli_fetch_assoc($book);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Edit Book</h1>
    <form method="POST">
        <input type="hidden" name="book_id" value="<?php echo $book['book_id'] ?>">
        <div>
            <label for="book_name" id="book_name">Book Name</label>
            <input type="text" id="book_name" name="book_name" placeholder="Book Name" value="<?php echo $book['book_name'] ?>">
        </div>
        <div>
            <label for="book_isbn" id="book_isbn">Book ISBN</label>
            <input type="text" id="book_isbn" name="book_isbn" placeholder="Book ISBN" value="<?php echo $book['book_isbn'] ?>">
        </div>
        <div>
            <label for="book_author" id="book_author">Book Author</label>
            <input type="text" id="book_author" name="book_author" placeholder="Book Author" value="<?php echo $book['book_author'] ?>">
        </div>
        <div>
            <label for="book_date" id="book_date">Book Date</label>
            <input type="date" id="book_date" name="book_date" placeholder="Book Date" value="<?php echo $book['book_date'] ?>">
        </div>
        <button type="submit" name="edit_books_btn" id="edit_books_btn">Edit Book</button>
    </form>
</body>

</html>