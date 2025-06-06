<?php
require_once 'connection.php';
?>

<!DOCTYPE html>

<head>
    <title>Practice Skill Test</title>
</head>

<body>
    <h>Display Books</h1>

        <table>
            <th>
                <tr>Book Id</tr>
                <tr>Book Name</tr>
                <tr>Book Isbn</tr>
                <tr>Book Author</tr>
                <tr>Book Date</tr>
            </th>
            <tbody>
                <?php
                foreach ($get_book_result as $book) {

                ?>

                    <tr>
                        <td><?php echo $book['book_id'] ?></td>
                        <td><?php echo $book['book_name'] ?></td>
                        <td><?php echo $book['book_isbn'] ?></td>
                        <td><?php echo $book['book_author'] ?></td>
                        <td><?php echo $book['book_date'] ?></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
        </br>
        <form method="GET">
            <label for="search_book" id="search_book">Search Book</label>
            <input type="text" id="search_book" name="search_book" placeholder="Search Book">
            <button type="submit" name="search_book_btn" id="search_book_btn">Search</button>
        </form>
        <h1>Search Result</h1>
        <div>
            <table>
                <th>
                    <tr>Book Id</tr>
                    <tr>Book Name</tr>
                    <tr>Book Isbn</tr>
                    <tr>Book Author</tr>
                    <tr>Book Date</tr>
                </th>
                <tbody>
                    <?php

                    foreach ($books as $book) {
                    ?>
                        <tr>
                            <td><?php echo $book['book_id'] ?></td>
                            <td><?php echo $book['book_name'] ?></td>
                            <td><?php echo $book['book_isbn'] ?></td>
                            <td><?php echo $book['book_author'] ?></td>
                            <td><?php echo $book['book_date'] ?></td>
                            <td><a href="edit.php?id=<?php echo $book['book_id'] ?>">Edit</a>
                            </td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="book_id" value="<?php echo $book['book_id'] ?>">
                                    <button type="submit" name="delete_books_btn">Delete</button>

                                </form>

                            </td>
                        </tr>
                    <?php
                    }


                    ?>
                </tbody>
            </table>
        </div>
        </br>


        </br>

        <h1>Add Book</h1>
        <form method="POST">
            <div>
                <label for="book_name" id="book_name">Book Name</label>
                <input type="text" id="book_name" name="book_name" placeholder="Book Name">
            </div>
            <div>
                <label for="book_isbn" id="book_isbn">Book ISBN</label>
                <input type="text" id="book_isbn" name="book_isbn" placeholder="Book ISBN">
            </div>
            <div>
                <label for="book_author" id="book_author">Book Author</label>
                <input type="text" id="book_author" name="book_author" placeholder="Book Author">
            </div>
            <div>
                <label for="book_date" id="book_date">Book Date</label>
                <input type="date" id="book_date" name="book_date" placeholder="Book Date">
            </div>
            <button type="submit" name="add_books_btn" id="add_book">Add Book</button>
        </form>
</body>

</html>