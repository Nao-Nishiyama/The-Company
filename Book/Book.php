<?php

class Book
{
    /*
        Access Modifier or Visibility
        1. public - Can be accessed anywhere
        2. private - Can be accessed within the class only
        3. protected - Can be accessed within the class and by the child/sub class
    */ 

    /* Properties*/ 
    public $title;
    public $author;
    public $price;
    private $published_yr = 2024;

    /* methods */
    public function displayDetails(){
        echo "Title: " . $this->title . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Published Year: " . $this->published_yr . "<br>";
    }

    // constructor
    public function __construct($title, $author, $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    // setter
    public function setDetails($title, $author, $price){
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    // getter
    public function getTitle(){
        return $this->title;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getPublishedYr(){
        return $this->published_yr;
    }
}

// Create an Object of the Class
// Instantiate or Instantiating a class
// $programming is now an object of the class Book and can now access public properties and methods
// $programming = new Book;

// echo "Title: " . $programming->title . "<br>";
// echo "Author: " . $programming->author . "<br>";
// echo "Price: " . $programming->price . "<br><br>";
// $programming->displayDetails();
// echo $programming->published_yr; // cannot access private property

/*-------------------------------------------------------------------------*/ 

// $english = new Book;
// // setter
// $english->setDetails('English Grammar', 'Mary Johnson', 250);
// // getter
// echo "Title: " . $english->getTitle() . "<br>";
// echo "Author: " . $english->getAuthor() . "<br>";
// echo "Price: " . $english->getPrice() . "<br>";
// echo "Published Year: " . $english->getPublishedYr() . "<br>";

?>