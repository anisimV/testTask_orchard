<?php

// Начать или возобновить сессию
session_start();

$showResults = false;

require_once 'classes/FruitTree.class.php';
require_once 'classes/AppleTree.class.php';
require_once 'classes/PearTree.class.php';
require_once 'classes/FruitCollector.class.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получите значения appleCount и pearCount из $_POST и выполните необходимую обработку

    // Установите значение $showResults в true, чтобы показать блок результатов
    $showResults = true;

    // Сохранить значение $showResults в сессию
    $_SESSION['showResults'] = $showResults;
}

// Проверить, было ли значение $showResults сохранено в сессии
if (isset($_SESSION['showResults']) && $_SESSION['showResults'] === true) {
    // Показать блок результатов
    $showResults = true;

    // Очистить значение $showResults из сессии
    $_SESSION['showResults'] = false;

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавление деревьев в сад</title>
</head>
<body>
    <h2>Добавление деревьев в сад</h2>
    <form action="index.php" method="post">
        <label for="appleCount">Количество деревьев яблоня:</label>
        <input type="number" id="appleCount" name="appleCount" min="0"><br><br>
        
        <label for="pearCount">Количество деревьев груша:</label>
        <input type="number" id="pearCount" name="pearCount" min="0"><br><br>
        
        <input type="submit" value="Добавить деревья и собрать урожай">
    </form>

    <div class="res">
        <?php if ($showResults): ?>
            <!-- Результаты вывода -->
            <?php 
            echo "Добавлено деревьев яблоня: " . $appleCount . "<br>";
            echo "Добавлено деревьев груша: " . $pearCount . "<br>";
            echo "Собрано яблок: " . $collectedFruits['totalApples'] . "<br>";
            echo "Собрано груш: " . $collectedFruits['totalPears'] . "<br>";
            echo "Общий вес яблок: " . $collectedFruits['totalWeightApples'] . "g<br>";
            echo "Общий вес груш: " . $collectedFruits['totalWeightPears'] . "g<br>";
            $totalWeight = $collectedFruits['totalWeightApples'] + $collectedFruits['totalWeightPears'];
            echo "Общий вес урожая: " . $totalWeight . "g<br>";
            ?>
        <?php endif; ?>
    </div>
</body>
</html>
