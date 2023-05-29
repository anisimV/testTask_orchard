<?php 

// Подключаем необходимые классы
require_once 'classes/FruitTree.class.php';
require_once 'classes/AppleTree.class.php';
require_once 'classes/PearTree.class.php';
require_once 'classes/FruitCollector.class.php';

// Получаем значения из формы
$appleCount = $_POST['appleCount'] ?? 0;
$pearCount = $_POST['pearCount'] ?? 0;

// Создаем экземпляры деревьев и добавляем их в сад
$collector = new FruitCollector();

for ($i = 0; $i < $appleCount; $i++) {
    $appleTree = new AppleTree('A' . ($i + 1));
    $collector->addFruitTree($appleTree);
}

for ($i = 0; $i < $pearCount; $i++) {
    $pearTree = new PearTree('P' . ($i + 1));
    $collector->addFruitTree($pearTree);
}

// Собираем урожай и получаем общее количество и вес собранных плодов
$collectedFruits = $collector->collectFruitsFromAllTrees();
