<?php 

class FruitCollector {
    protected $fruitTrees;
    
    public function __construct() {
        $this->fruitTrees = [];
    }
    
    public function addFruitTree(FruitTree $fruitTree) {
        $this->fruitTrees[] = $fruitTree;
    }
    
    public function collectFruitsFromAllTrees() {
        $collectedFruits = [];
        $totalWeightApples = 0;
        $totalWeightPears = 0;
        
        $collectedFruits['apples'] = 0;
        $collectedFruits['pears'] = 0;
        
        foreach ($this->fruitTrees as $tree) {
            if ($tree instanceof AppleTree) {
                $collected = $tree->collectFruits();
                $collectedFruits['apples'] += $collected;
                $totalWeightApples += $collected * $tree->getWeightPerFruit();
            } elseif ($tree instanceof PearTree) {
                $collected = $tree->collectFruits();
                $collectedFruits['pears'] += $collected;
                $totalWeightPears += $collected * $tree->getWeightPerFruit();
            }
        }
        
        $collectedFruits['totalApples'] = $collectedFruits['apples'];
        $collectedFruits['totalPears'] = $collectedFruits['pears'];
        $collectedFruits['totalWeightApples'] = $totalWeightApples;
        $collectedFruits['totalWeightPears'] = $totalWeightPears;
        
        return $collectedFruits;
    }
}
