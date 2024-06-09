<?php

class School
{
    public $name;
    public $year;
    public $units;
    public $laboratory;
    public $price;

    public function setDetails($year, $units, $laboratory){
        $this->year = $year;
        $this->units = $units;
        $this->laboratory = $laboratory;

    }

    public function computePrice(){
        $year = $this->year;
        $units = $this->units;
        $laboratory = $this->laboratory;
        
        if ($year == 1){
            $price = $units * 550;
            if($laboratory == "yes"){
                $price += 3359;
            }
        } elseif ($year == 2){
            $price = $units * 630;
            if($laboratory == "yes"){
                $price += 4000;
            }
        } elseif ($year == 3){
            $price = $units * 470;
            if($laboratory == "yes"){
                $price += 2890;
            }
        } else {
            $price = $units * 501;
            if($laboratory == "yes"){
                $price += 3555;
            }
        } 

        return number_format($price, 2);
    }

    public function getLab(){
        $laboratory = $this->laboratory;

        if($laboratory == "yes"){
            return " (With Lab)";
        }

        return " (Without Lab)";
    }
}

?>