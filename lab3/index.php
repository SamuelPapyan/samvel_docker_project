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
    <h2>Merge Sort</h2>
    <?php      
        function mergeSort($array, $n) {
            if ($n <= 1) return $array;
            $m = ($n - ($n % 2)) / 2;
            $n1 = $m;
            $n2 = $m + ($n % 2);
            $arr1 = [];
            $arr2 = [];
            for ($i = 0; $i < $n1; $i++) {
                $arr1[$i] = $array[$i];
            }
            for ($i = 0; $i < $n2; $i++) {
                $arr2[$i] = $array[$m + $i];
            }
            $arr1 = mergeSort($arr1, $n1);
            $arr2 = mergeSort($arr2, $n2);
            $newArr = [];
            $i = 0; $j = 0;
            while ($i < $n1 or $j < $n2) {
                if ($i < $n1 and ($j < $n2 and $arr1[$i] <= $arr2[$j] or $j >= $n2)) {
                    $newArr[$i + $j] = $arr1[$i];
                    $i++;
                }
                if ($j < $n2 and ($i < $n1 and $arr2[$j] <= $arr1[$i] or $i >= $n1)) {
                    $newArr[$i + $j] = $arr2[$j];
                    $j++;
                }
            }
            return $newArr;
        }

        $arr = [10, 5, 13, 5, 4, 65];
        print_r($arr);
        $array = mergeSort($arr, 6);
        print_r($arr);

    ?>  
    <h2>Quick Sort</h2>
    <?php
        $arr = [42, 51, 6, 4, 14, 6, 1];
        $n = 7;
        
        print_r($arr);
        
        function quickSort($array, $n) {
            if ($n <= 1) return $array;
            $pivot = $array[$n - 1];
            $arr1 = [];
            $arr2 = [];
            $n1 = 0;
            $n2 = 0;
            for ($i = 0; $i < $n-1; $i++) {
                if ($array[$i] < $pivot) $arr1[$n1++] = $array[$i];
                else $arr2[$n2++] = $array[$i];
            }
            $arr1 = quickSort($arr1, $n1);
            $arr2 = quickSort($arr2, $n2);
            $newArr = [];
            $k = 0;
            for ($i = 0; $i < $n1; $i++) $newArr[$k++] = $arr1[$i];
            $newArr[$k++] = $pivot;
            for ($i = 0; $i < $n2; $i++) $newArr[$k++] = $arr2[$i];
            return $newArr;
        }
        
        $array = quickSort($arr, $n);
        print_r($arr);
    ?>
    <h2>Shell Sort</h2>
    <?php
        
    ?>
</body>
</html>