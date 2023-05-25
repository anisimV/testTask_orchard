<!DOCTYPE html>
<html>
<head>
    <title>Сад</title>
</head>
<body>
    <h1>Сад</h1>
    <form method="post">
        <label>Тип дерева:</label>
        <select name="tree_type">
            <option value="яблоня">Яблоня</option>
            <option value="груша">Груша</option>
        </select>
        <label>Количество деревьев:</label>
        <input type="number" name="tree_count" min="1">
        <input type="submit" name="add_trees" value="Добавить деревья">
    </form>

    <form method="post">
        <input type="submit" name="harvest" value="Собрать плоды">
    </form>

    <?php
    session_start();

    // Проверка инициализации сессии
    if (!isset($_SESSION['garden'])) {
        $_SESSION['garden'] = array(
            'яблоня' => array(),
            'груша' => array()
        );
    }

    // Проверка нажатия кнопки "Добавить деревья"
    if (isset($_POST['add_trees'])) {
        $tree_type = $_POST['tree_type'];
        $tree_count = intval($_POST['tree_count']);

        // Генерация уникальных номеров для деревьев
        $start_number = count($_SESSION['garden'][$tree_type]) + 1;
        for ($i = $start_number; $i <= $start_number + $tree_count - 1; $i++) {
            $_SESSION['garden'][$tree_type][] = $i;
        }

        echo "<p>Добавлено $tree_count деревьев $tree_type.</p>";
    }

    // Проверка нажатия кнопки "Собрать плоды"
    if (isset($_POST['harvest'])) {
        $total_fruit_count = array(
            'яблоня' => 0,
            'груша' => 0
        );
        $total_fruit_weight = array(
            'яблоня' => 0,
            'груша' => 0
        );

        foreach ($_SESSION['garden'] as $tree_type => $trees) {
            foreach ($trees as $tree_number) {
                $fruit_count = 0;
                $fruit_weight = 0;

                if ($tree_type === 'яблоня') {
                    $fruit_count = rand(40, 50);
                    $fruit_weight = rand(150, 180);
                } elseif ($tree_type === 'груша') {
                    $fruit_count = rand(0, 20);
                    $fruit_weight = rand(130, 170);
                }

                $total_fruit_count[$tree_type] += $fruit_count;
                $total_fruit_weight[$tree_type] += ($fruit_weight * $fruit_count);

                echo "<p>С дерева $tree_number ($tree_type) собрано $fruit_count плодов (общий вес: " . ($fruit_weight * $fruit_count) . " гр).</p>";
            }
        }

        echo "<h2>Общее количество собранных плодов:</h2>";
        echo "<p>Яблони: {$total_fruit_count['яблоня']} (общий вес: {$total_fruit_weight['яблоня']} гр)</p>";
        echo "<p>Груши: {$total_fruit_count['груша']} (общий вес: {$total_fruit_weight['груша']} гр)</p>";
    }
    ?>
</body>
</html>