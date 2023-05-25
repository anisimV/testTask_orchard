<?php 

class Fruit {
    protected $weight;
    
    public function __construct($weight) {
        $this->weight = $weight;
    }
    
    public function getWeight() {
        return $this->weight;
    }
}

class Apple extends Fruit {
    protected $quantity;
    
    public function __construct($quantity) {
        parent::__construct(rand(150, 180)); // случайный вес яблока
        $this->quantity = $quantity;
    }
    
    public function getQuantity() {
        return $this->quantity;
    }
}

class Pear extends Fruit {
    protected $quantity;
    
    public function __construct($quantity) {
        parent::__construct(rand(130, 170)); // случайный вес груши
        $this->quantity = $quantity;
    }
    
    public function getQuantity() {
        return $this->quantity;
    }
}

class Garden {
    protected $trees = array();
    
    public function добавитьДерево($tree) {
        $this->trees[] = $tree;
    }
    
    public function собратьПлоды() {
        $applesTotal = 0;
        $pearsTotal = 0;
        
        foreach ($this->trees as $tree) {
            if ($tree instanceof Apple) {
                $applesTotal += $tree->getQuantity();
            } else if ($tree instanceof Pear) {
                $pearsTotal += $tree->getQuantity();
            }
        }
        
        return array('apples' => $applesTotal, 'pears' => $pearsTotal);
    }
}
