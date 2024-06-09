<?php

class Employee
{
    public $name;
    public $civil_status;
    public $position;
    public $emp_status;
    public $hrs_worked;
    public $ot_hours;

    public $day_rate;
    public $over_time_rate;
    public $reg_pay;
    public $ot_pay;
    public $gross_income;
    public $health_care;
    public $tax;
    public $deduction;

    public $day_rate_admin_contractual  = 350;
    public $day_rate_admin_probationary = 400;
    public $day_rate_admin_regular      = 500;
    public $day_rate_staff_contractual  = 300;
    public $day_rate_staff_probationary = 350;
    public $day_rate_staff_regular      = 400;

    public $hrs_per_day = 8;

    public $over_time_rate_admin_contractual  = 15;
    public $over_time_rate_admin_probationary = 30;
    public $over_time_rate_admin_regular      = 40;
    public $over_time_rate_staff_contractual  = 10;
    public $over_time_rate_staff_probationary = 25;
    public $over_time_rate_staff_regular      = 30;

    public $tax_rate_single_over_1000 = .05;
    public $tax_rate_married_over_1500 = .03;

    public $health_care_single = 200;
    public $health_care_married = 75;


    public function __construct($name, $civil_status, $position, $emp_status, $hrs_worked, $ot_hours)
    {
        $this->name = $name;
        $this->civil_status = $civil_status;
        $this->position = $position;
        $this->emp_status = $emp_status;
        $this->hrs_worked = $hrs_worked;
        $this->ot_hours = $ot_hours;
    }


    public function computeGrossIncome()
    {
        // regular pay
        if($this->hrs_worked > 40){
            $hrs_worked = 40;
            $ot_hours   = $this->hrs_worked - 40 + $this->ot_hours;
        } else {
            $hrs_worked = $this->hrs_worked;
            $ot_hours   = $this->ot_hours;            
        }

        if($this->position == "admin"){
            if($this->emp_status == "contractual"){
                $day_rate = $this->day_rate_admin_contractual; 
                $reg_pay = $day_rate / $this->hrs_per_day * $hrs_worked;
            } elseif ($this->emp_status == "probationary"){
                $day_rate = $this->day_rate_admin_probationary; 
                $reg_pay = $day_rate / $this->hrs_per_day * $hrs_worked;
            } else {
                $day_rate = $this->day_rate_admin_regular; 
                $reg_pay = $day_rate / $this->hrs_per_day * $hrs_worked;
            }
        } else {
            if($this->emp_status == "contractual"){
                $day_rate = $this->day_rate_staff_contractual; 
                $reg_pay = $day_rate / $this->hrs_per_day * $hrs_worked;
            } elseif ($this->emp_status == "probationary"){
                $day_rate = $this->day_rate_staff_probationary; 
                $reg_pay = $day_rate / $this->hrs_per_day * $hrs_worked;
            } else {
                $day_rate = $this->day_rate_staff_regular; 
                $reg_pay = $day_rate / $this->hrs_per_day * $hrs_worked;
            }
        }

        // over time
        if($this->position == "admin"){
            if($this->emp_status == 'contractual'){
                $over_time_rate = $this->over_time_rate_admin_contractual;
                $ot_pay = $over_time_rate * $ot_hours;
            } elseif ($this->emp_status == 'probationary'){
                $over_time_rate = $this->over_time_rate_admin_probationary;
                $ot_pay = $over_time_rate * $ot_hours;
            } else {
                $over_time_rate = $this->over_time_rate_admin_regular;
                $ot_pay = $over_time_rate * $ot_hours;
            }
        } else {
            if($this->emp_status == 'contractual'){
                $over_time_rate = $this->over_time_rate_staff_contractual;
                $ot_pay = $over_time_rate * $ot_hours;
            } elseif ($this->emp_status == 'probationary'){
                $over_time_rate = $this->over_time_rate_staff_probationary;
                $ot_pay = $over_time_rate * $ot_hours;
            } else {
                $over_time_rate = $this->over_time_rate_staff_regular;
                $ot_pay = $over_time_rate * $ot_hours;
            }
        }

        $gross_income = $reg_pay + $ot_pay;

        $this->reg_pay = $reg_pay;
        $this->ot_pay = $ot_pay;
        $this->gross_income = $gross_income;

        return number_format($gross_income, 2) . "<br>" . 
        "<span class='fst-italic text-secondary'>Regular Pay: (" . $hrs_worked . " hrs x " . $day_rate / $this->hrs_per_day . "/day) + OT Pay: (" . $ot_hours  . "hrs x " . $over_time_rate . "/hour)";
    }


    public function computeNetIncome()
    {
        $gross_income = $this->gross_income;
        
        // Healthcare
        if ($this->civil_status == "single"){
                $health_care = $this->health_care_single;
            } else {
                $health_care = $this->health_care_married;
            }

        // Tax
        if ($this->civil_status == "single"){
            if ($gross_income > 1000){
                $tax = $gross_income * $this->tax_rate_single_over_1000;
            } else {
                $tax = 0;
            }
        } else {
            if ($gross_income > 1500){
                $tax = $gross_income * $this->tax_rate_married_over_1500;
            } else {
                $tax = 0;
            }
        }
        $deduction = $health_care + $tax;
        
        return number_format($gross_income - ($deduction), 2)  . "<br>" . 
        "<span class='fst-italic text-secondary'>Gross Income: (" . number_format($gross_income, 2) . " ) - ( Tax: " . number_format($tax, 2) . " + Health Care: " . number_format($health_care, 2) . ")";
    }

}
?>