<?php 

    require_once('bookList.php');

    if(isset($_POST["search_btn"])){
        $searched_book = $_POST["searched_book"];
        $searched_by = $_POST["options"];

        function filter($array, $filterValue, $inputValue){
            $filteredBooks = [];

            foreach($array as $book){
                if($book["$filterValue"] == $inputValue){
                    $filteredBooks[] = $book;
                }
            }

            if($book["$filterValue"] != $inputValue){
                if(empty($filteredBooks)){
                    echo "<p class='error_message'>Book not found</p>";
                }
            }

            return $filteredBooks;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search!</title>
</head>
<body>
    <h1>Search the Library</h1>
    
    <br>

    <div class="topCont">
        <form method="post">
            <input type="text" name="searched_book" placeholder="Search for Books">
            <p>
                <select name="options" id="">
                    <option value="author">Author</option>
                    <option value="genre">Genre</option>
                    <option value="price">Price</option>
                </select>
            </p>
            <button name="search_btn" id="search_btn">Search</button>
        </form>
    </div>

    <br><br>

    <div class="main">
        <?php if(isset($searched_by) && isset($searched_book)){ ?>
        <?php foreach(filter($books, $searched_by, $searched_book) as $book): ?>
        <div class="book">
            <h2>Title : <?= $book['title'] ?></h2>
            <h4>Author : <?= $book['author'] ?></h4> 
            <h4>Price : <?= $book['price'] ?></h4>
            <h4>Genre : <?= $book['genre'] ?> </h4>
        </div>
        <?php endforeach; ?>
        <?php }else{
            echo "<p class='welcome_message'>Search the Library for a book</p>";
        } ?>
    </div>

</body>
</html>

