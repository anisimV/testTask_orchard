<?php 

class AppleTree extends FruitTree {
    public function collectFruits() {
        $collected = mt_rand(40, 50);
        $this->fruitCount -= $collected;
        return $collected;
    }
    
    public function getWeightPerFruit() {
        return mt_rand(150, 180);
    }
}
