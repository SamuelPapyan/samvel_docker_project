<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB 3</title>
</head>
<body>
    <h1>LAB 3</h1>
    <h2>Selection Sort</h2>
    <?php
        $arr = [5,3,1,6,8];
        $n = count($arr);
        print_r($arr);
        echo "<br>";
        for ($i = 0; $i < $n; $i++) {
            $minIndex = $i;
            for ($j = $i+1; $j < $n; $j++) {
                if ($arr[$j] < $arr[$minIndex])
                    $minIndex = $j;
                $k = $arr[$i];
                $arr[$i] = $arr[$minIndex];
                $arr[$minIndex] = $k;
            }
        }
        print_r($arr);

    ?>
    <h2>Bubble Sort</h2>
    <?php
        $arr = [5,3,1,6,8];
        $n = count($arr);
        print_r($arr);
        echo "<br>";
        $swapped = true;
        while ($swapped) {
            $swapped = false;
            for ($i = 0; $i < $n-1; $i++) {
                if ($arr[$i] > $arr[$i+1]) {
                    $k = $arr[$i];
                    $arr[$i] = $arr[$i + 1];
                    $arr[$i + 1] = $k;
                    $swapped = true;
                }
            }
        }
        print_r($arr);
    ?>
    <h2>Insertion sort</h2>
    <?php
        $arr = [5,3,1,6,8];
        $n = count($arr);
        print_r($arr);
        echo "<br>";
        for ($i = 1; $i < $n; $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 and $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j = $j - 1;
            }
            $arr[$j + 1] = $key;
        }
        print_r($arr);
    ?>
</body>
</html>