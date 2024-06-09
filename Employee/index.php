<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Employee</title>
  </head>
  <body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label for="civil_status" class="form-label">Civil Status</label>
                        <select name="civil_status" id="civil_status" class="form-select">
                            <option disabled selected>Select Civil Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <select name="position" id="position" class="form-select" required>
                            <option disabled selected>Select Position</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="employment_status" class="form-label">Employment Status</label>
                        <select name="employment_status" id="employment_status" class="form-select" required>
                            <option disabled selected>Select Employment Status</option>
                            <option value="contractual">Contractual</option>
                            <option value="probationary">Probationary</option>
                            <option value="regular">Regular</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="regular_hours_rendered" class="form-label">Regular Hours Rendered</label>
                        <input type="number" name="regular_hours_rendered" id="regular_hours_rendered" class="form-control" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="ot_hours" class="form-label">Over Time Hours</label>
                        <input type="number" name="ot_hours" id="ot_hours" class="form-control" min="0">
                    </div>
                    <input type="submit" value="Submit" name="submit" class="btn btn-success w-100">
                </form>
            </div>
            <div class="col-8">

<?php
    include "Employee.php";

    if(isset($_POST['submit'])){

        $name           = $_POST['name'];
        $civil_status   = $_POST['civil_status'];
        $position       = $_POST['position'];
        $emp_status     = $_POST['employment_status'];
        $hrs_worked     = $_POST['regular_hours_rendered'];
        $ot_hours       = $_POST['ot_hours'];

        $employee = new Employee($name, $civil_status, $position, $emp_status, $hrs_worked, $ot_hours);
?>

        <table class='table table-bordered table-striped'>
                <tbody>
                    <tr>
                        <th class="table-dark" style="width: 200px;">Full Name</th>
                        <td><?= $name ?></td>
                    </tr>
                    <tr>
                        <th class="table-dark">Civil Status</th>
                        <td><?= $civil_status ?></td>
                    </tr>
                    <tr>
                        <th class="table-dark">Position</th>
                        <td><?= $position ?></td>
                    </tr>
                    <tr>
                        <th class="table-dark">Employment Status</th>
                        <td><?= $emp_status ?></td>
                    </tr>
                    <tr>
                        <th class="table-dark">Gross Income</th>
                        <td><?= $employee->computeGrossIncome()?></td>
                    </tr>
                    <tr>
                        <th class="table-dark">Net Income</th>
                        <td><?= $employee->computeNetIncome() ?></td>
                    </tr>
                </tbody>
              </table>
<?php
    }

?>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>