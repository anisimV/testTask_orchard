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
