<?php 

class PearTree extends FruitTree {
    public function collectFruits() {
        $collected = mt_rand(0, 20);
        $this->fruitCount -= $collected;
        return $collected;
    }
    
    public function getWeightPerFruit() {
        return mt_rand(130, 170);
    }
}
