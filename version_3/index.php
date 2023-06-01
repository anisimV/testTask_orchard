<?php

// Начать или возобновить сессию
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

if(!isset($_SESSION['showResults'])) $_SESSION['showResults'] = 0;

require_once 'classes/FruitTree.class.php';
require_once 'classes/AppleTree.class.php';
require_once 'classes/PearTree.class.php';
require_once 'classes/FruitCollector.class.php';
require_once 'functions.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавление деревьев в сад</title>
</head>
<body>
    <h2>Добавление деревьев в сад</h2>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

        <label for="appleCount">Количество деревьев яблоня:</label>
        <input type="number" id="appleCount" name="appleCount" min="0"><br><br>
        
        <label for="pearCount">Количество деревьев груша:</label>
        <input type="number" id="pearCount" name="pearCount" min="0"><br><br>
        
        <input type="submit" value="Добавить деревья и собрать урожай">
    </form>
    <?php
        if(isset($_POST['appleCount']) && $_POST['appleCount']!='' && $_SESSION['showResults']==0)
        {
            $_SESSION['showResults'] = 1;
        ?>
    <div class="res">
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
    </div>
    <?php
    }
    else if(isset($_POST['appleCount']) && $_SESSION['showResults']==1)
    {
    header('Location:'. $_SERVER['SCRIPT_NAME']);
    $_SESSION['showResults'] = 0;
    }
?>
</body>
</html>
