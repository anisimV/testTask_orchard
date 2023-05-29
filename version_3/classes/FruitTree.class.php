<?php 

class FruitTree {
    protected $registrationNumber;
    protected $fruitCount;
    
    public function __construct($registrationNumber) {
        $this->registrationNumber = $registrationNumber;
        $this->fruitCount = 0;
    }
    
    public function getRegistrationNumber() {
        return $this->registrationNumber;
    }
    
    public function getFruitCount() {
        return $this->fruitCount;
    }
    
    public function addFruits($count) {
        $this->fruitCount += $count;
    }
}
