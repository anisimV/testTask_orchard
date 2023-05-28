<?php 

require_once 'garden.php';

$garden = new Garden();

// Добавляем яблони и груши в сад
$garden->добавитьДерево(new Apple(rand(40, 50)));
$garden->добавитьДерево(new Apple(rand(40, 50)));
$garden->добавитьДерево(new Apple(rand(40, 50)));
$garden->добавитьДерево(new Pear(rand(0, 20)));
$garden->добавитьДерево(new Pear(rand(0, 20)));
$garden->добавитьДерево(new Pear(rand(0, 20)));

// Собираем плоды со всех деревьев
$harvest = $garden->собратьПлоды();

// Выводим результаты
echo "Собрано яблок: " . $harvest['apples'] . "\n";
echo "Собрано груш: " . $harvest['pears'] . "\n";

/*
$pear = new Pear(implode(',', $harvest)); // Создание экземпляра класса Pear
$weight = $pear->getWeight(); // Получение веса груши
$quantity = $pear->getQuantity(); // Получение количества груш

echo "Weight: " . $weight . "g" . PHP_EOL;
echo "Quantity: " . $quantity . PHP_EOL;
*/

$fruit = new Fruit(implode(',', $harvest)); // Создание экземпляра класса Fruit с весом 150
$weight = $fruit->getWeight(); // Получение веса фрукта

echo "Weight: " . $weight . "g" . PHP_EOL;
