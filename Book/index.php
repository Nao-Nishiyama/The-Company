<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book OOP</title>
</head>
<body>
    <form action="" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title"><br>

        <label for="author">Author</label>
        <input type="text" name="author" id="author"><br>

        <label for="price">Price</label>
        <input type="number" name="price" id="price"><br>

        <button type="submit" name="btn_submit">Submit</button>
    </form>
</body>
</html>

<?php
    include "Book.php";

    if(isset($_POST['btn_submit'])){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $price = $_POST['price'];

        // create an object
        $book = new Book($title, $author, $price);

        // SET values
        // $book->setDetails($title, $author, $price);

        // GET and Display Values
        echo "Title: " . $book->getTitle(). "<br>";
        echo "Author: " . $book->getAuthor(). "<br>";
        echo "Price: " . $book->getPrice(). "<br>";
        echo "Published Yr: " . $book->getPublishedYr(). "<br>";
    }
?>