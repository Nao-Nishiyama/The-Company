<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container w-50">
        <div class="card mx-auto w-75 mt-5 border border-0">
            <div class="card-header bg-white border-0">
                <h2 class="text-center">REGISTRATION</h2>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-4">
                        <label for="name" class="form-label">Student's Name</label>
                        <input type="text" name="name" id="name" class="form-control" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label for="year-level" class="form-label">Year Level</label>
                        <select name="year_level" class="form-select" id="year-level" required>
                            <option value="" hidden>Choose your year level</option>
                            <option value="1">Year 1</option>
                            <option value="2">Year 2</option>
                            <option value="3">Year 3</option>
                            <option value="4">Year 4</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="units" class="form-label">Total Units</label>
                        <input type="number" name="units" id="units" class="form-control" max="23" placeholder="Maximum of 23" required>
                    </div>
                    <div class="mb-3 text-center">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="laboratory" id="lab" value="yes" class="form-check-input" required>
                            <label for="lab" class="form-check-label">With lab</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="laboratory" id="no-lab" value="no" class="form-check-input">
                            <label for="no-lab" class="form-check-label">Without lab</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="submit" value="Submit" name="submit" class="btn btn-dark w-100">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    include "School.php";

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $year = $_POST['year_level'];
        $units = $_POST['units'];
        $laboratory = $_POST['laboratory'];

        // create an object
        $school = new School;

        // SET values
        $school->setDetails($year, $units, $laboratory);

        // GET and Display Values
        echo "<div class='container w-50'>
                <div class='card mx-auto w-75 mt-1 border border-1'>
                  <div class='card-body'>
                    <p>Student name: <span class='fw-bold'>"  . $name;  echo "</span></p>
                    <p>Year Level: <span class='fw-bold'>"    . $year;    echo "</span></p>
                    <p>No. of units: <span class='fw-bold'>"  . $units; echo "</span></p>
                    <div class='fw-bold'>Total Price: "       . $school->computePrice() . $school->getLab();
            echo "</div>
                </div>
              </div>";
    }
?>