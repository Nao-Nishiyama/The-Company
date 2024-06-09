<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fare Activity</title>
</head>
<body>
    <form action="" method="post">
        <label for="age">Age</label>
        <input type="number" name="age" id="age"><br>

        <label for="distance">Distance</label>
        <input type="number" name="distance" id="distance"><br>

        <button type="submit" name="btn_submit">Submit</button>
    </form>
</body>
</html>

<?php
    include "Fare.php";

    if(isset($_POST['btn_submit'])){
        $age = $_POST['age'];
        $distance = $_POST['distance'];

        // create an object
        $fare = new Fare;

        // SET values
        $fare->setDetails($age, $distance);

        // GET and Display Values
        echo "Age: " . $fare->getAge(). " yeasrs old<br>";
        echo "Distance: " . $fare->getDistance(). " km<br>";
        echo "Fare: " . $fare->getFare(). "<br>";
    }
?>