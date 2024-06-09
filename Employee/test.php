
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

        echo "Gross Income: " . number_format($employee->computeGrossIncome(), 2). "<br>";
        echo "Net Income: " . number_format($employee->computeNetIncome(),2 ) . "<br>";

        echo "<table class='table table-bordered table-striped'>
                <tbody>
                    <tr>
                        <th>Full Name</th>
                        <td>"; $name; echo "</td>
                    </tr>
                    <tr>
                        <th>Civil Status</th>
                        <td>"; $civil_status; echo "</td>
                    </tr>
                    <tr>
                        <th>Civil Status</th>
                        <td>"; $civil_status; echo "</td>
                    </tr>
                </tbody>
              </table>";
    }

?>