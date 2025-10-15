<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB 3</title>
</head>
<body>
    <h1>LAB 3</h1>
    <h2>Selection Sort O(n<sup>2</sup>)</h2>
    <?php
        function printArray($array) {
            foreach($array as $elem) {
                echo "| $elem ";
            }
            echo "|<br>";
        }
        
        function selectionSort(&$array, $n) {
            for ($i = 0; $i < $n; $i++) {
                $minIndex = $i;
                for ($j = $i+1; $j < $n; $j++) {
                    if ($array[$j] < $array[$minIndex])
                        $minIndex = $j;
                    $k = $array[$i];
                    $array[$i] = $array[$minIndex];
                    $array[$minIndex] = $k;
                }
            }
        }

        $arr = [5,3,1,6,8];
        $n = 5;
        printArray($arr);
        echo "<br>";
        selectionSort($arr, $n);
        printArray($arr);

    ?>
    <h2>Bubble Sort O(n (n-1) /2)</h2>
    <?php
        function bubbleSort(&$array, $n) {
            $swapped = true;
            while ($swapped) {
                $swapped = false;
                for ($i = 0; $i < $n-1; $i++) {
                    if ($array[$i] > $array[$i+1]) {
                        $k = $array[$i];
                        $array[$i] = $array[$i + 1];
                        $array[$i + 1] = $k;
                        $swapped = true;
                    }
                }
            }
        }
        $arr = [5,3,1,6,8];
        $n = 5;
        printArray($arr);
        echo "<br>";
        bubbleSort($arr, $n);
        printArray($arr);
    ?>
    <h2>Insertion sort O(n<sup>2</sup>)</h2>
    <?php
        function insertionSort(&$array, $n) {
            for ($i = 1; $i < $n; $i++) {
                $key = $array[$i];
                $j = $i - 1;
                while ($j >= 0 and $array[$j] > $key) {
                    $array[$j + 1] = $array[$j];
                    $j = $j - 1;
                }
                $array[$j + 1] = $key;
            }
        }
        $arr = [5,3,1,6,8];
        $n = 5;
        printArray($arr);
        echo "<br>";
        insertionSort($arr, $n);
        printArray($arr);
    ?>
    <h2>Merge Sort O(n log<sub>2</sub>n)</h2>
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
        printArray($arr);
        echo "<br>";
        $arr = mergeSort($arr, 6);
        printArray($arr);

    ?>  
    <h2>Quick Sort O(n log<sub>2</sub>n)</h2>
    <?php
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

        $arr = [42, 51, 6, 4, 14, 6, 1];
        $n = 7;
        printArray($arr);
        echo "<br>";
        $arr = quickSort($arr, $n);
        printArray($arr);
    ?>
    <h2>Shell Sort O(n log<sub>2</sub>n) ~ O(n<sup>1.25</sup>)</h2>
    <?php
        function shellSort(&$arr, $n) {
            $gap = $n;
            while ($gap != 1) {
                $gap = ($gap + ($gap % 2)) / 2;
                for ($i = $gap; $i < $n; $i++) {
                        $j = $i - $gap;
                        while ($j >= 0 and $arr[$j] > $arr[$j + $gap]) {
                                $buff = $arr[$j + $gap];
                                $arr[$j + $gap] =  $arr[$j];
                                $arr[$j] = $buff;
                                $j--;
                        }
                    }
            }
        }

        $array = [61, 5, 4, 123, 67, 4, 1];
        $n = 7;
        printArray($array);
        echo "<br>";
        shellSort($array, $n);
        printArray($array);
    ?>
</body>
</html>