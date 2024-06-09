<?php

class Fare
{

    /* Properties*/ 
    public $age;
    public $distance;
    public $fare;

    // setter
    public function setDetails($age, $distance){
        $this->age = $age; 
        $this->distance = $distance;
    }

    // getter
    public function getAge(){
        return $this->age;
    }

    public function getDistance(){
        return $this->distance;
    }

    public function getFare(){
        $distance = $this->distance;
        $age = $this->age;
        
        if($distance > 4){
            $fare = $distance + 4;
        } else {
            $fare = 8;
        }
        
        if($age >= 60){
            $fare = $fare * .8;
        }

        return $fare;
    }

}

?>