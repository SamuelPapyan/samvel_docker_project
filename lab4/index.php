<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB 4</title>
</head>
<body>
    <h1>LAB 4</h1>
    <h2>Linear Search O(n)</h2>
    <?php 

        function printArray($array) {
            foreach($array as $elem) {
                echo "| $elem ";
            }
            echo "|<br>";
        }
        // O(n)
        $array = [6,4,1,4,5,1,4,123];
        $n = 8;

        function linearSearch($arr, $n, $num) {
            for ($i = 0; $i < $n; $i++) {
                if ($arr[$i] == $num)
                    return $i;
            }
            return -1;
        }
        printArray($array);
        echo "<br>";
        echo "Number 5 is at index " . linearSearch($array, $n, 5);
    ?>
    <h2>Binary Search O(log<sub>2</sub>n)</h2>
    <?php 
        $array = [1,4,4,6,7,8,9,10,12];
        $n = 9;
        // O(logn)
        function binarySearch($arr, $n, $num, $low=0, $high=-1) {
            if ($high == -1) {
                $high = $n;
            }
            while ($low <= $high) {
                $mid = (($low + $high) + ($low + $high) % 2) / 2;
                if ($arr[$mid] == $num) {
                    return $mid;
                } else if ($num < $arr[$mid]) {
                    $high = $mid - 1;
                } else if ($num > $arr[$mid]) {
                    $low = $mid + 1;
                }
                return binarySearch($arr, $n, $num, $low, $high); 
            }
            return -1;
        }
        printArray($array);
        echo "<br>";
        echo "Number 6 is at index " . binarySearch($array, $n, 6);
    ?>
    <h2>Binary Search Tree O(log n)</h2>
    <?php 
        class TreeNode {
            public $value;
            public $left = NULL;
            public $right = NULL;
            
            public function __construct($value)
            {
                $this->value = $value;   
            }
        }

        class BinarySearchTree
        {
            protected $root = NULL;
            
            public function __construct($value) {
                $this->root = new TreeNode($value);
            }
            
            public function isEmpty() {
                return is_null($this->root);
            }
            
            public function insert($value) {
                $node = new TreeNode($value);
                $this->insertNode($node, $this->root);
            }
            
            protected function insertNode(TreeNode $node, &$subtree) {
                if (is_null($subtree)) {
                    $subtree = $node;
                } else {
                    if ($node->value < $subtree->value) {
                        $this->insertNode($node, $subtree->left);
                    } elseif ($node->value > $subtree->value) {
                        $this->insertNode($node, $subtree->right);
                    }
                }
                return $this;
            }
            
            public function findNode ($value, &$subtree = 0) {
                if ($subtree === 0) {
                    $subtree = $this->root;
                }
                if (is_null($subtree)) {
                    return NULL;
                }
                
                if ($subtree->value > $value) {
                    return $this->findNode($value, $subtree->left);
                } elseif ($subtree->value < $value) {
                    return $this->findNode($value, $subtree->right);
                } else {
                    return $subtree;
                }
            }
            
            public function printTree($subtree=0, $spaces="") {
                if ($subtree === 0)
                    $subtree=$this->root;
                if (!is_null($subtree->left)) {
                    $this->printTree($subtree->left, $spaces . "-----");
                    echo $spaces . "/" . "<br>";
                }
                echo $spaces . $subtree->value . "<br>";
                if (!is_null($subtree->right)) {
                    echo $spaces . "\\" . "<br>";
                    $this->printTree($subtree->right, $spaces . "-----");
                }
            }
        }

        $tree = new BinarySearchTree(5);
        $tree->insert(4);
        $tree->insert(6);
        $tree->insert(2);
        $tree->insert(1);
        $tree->insert(10);
        $tree->insert(9);
        $tree->insert(3);
        $tree->printTree();

        echo "<br>
        <p>Searching 2</p>
        <br>";

        $tree->printTree($tree->findNode(2));
    ?>
    <h2>Hash Tries O(k)</h2>
    <?php 
        class Node {
            public $value = NULL;
            public $next = NULL;
            
            public function __construct($value=NULL) {
                $this->value = $value;
            }
        }

        class HashTries {
            private $root = [];
            
            public function __construct() {
                // $this->initTrie($this->root);
            }
            
            private function initTrie(&$subtrie) {
                for ($a = 97; $a <= 122; $a++)
                    $subtrie[chr($a)] = NULL;
            }
            
            private function valueLength($value) {
                $n = 0;
                while (($value[$n] ?? false) !== false)
                    $n++;
                return $n;
            }
            
            public function insert($value) {
                $tmp = &$this->root;
                $n = $this->valueLength($value);
                for ($i = 0; $i < $n-1; $i++) {
                    if (!isset($tmp[$value[$i]]))
                        $tmp[$value[$i]] = new Node();
                    if (is_null($tmp[$value[$i]]->next)) {
                        $tmp[$value[$i]]->next = [];
                        // $this->initTrie($tmp[$value[$i]]->next);
                    }
                    $tmp = &$tmp[$value[$i]]->next;
                }
                if (!isset($tmp[$value[$n-1]])) {
                    $tmp[$value[$n-1]] = new Node($value);
                } else {
                    $tmp[$value[$n-1]]->value = $value;
                }
            }
            
            public function search($value) {
                $tmp = $this->root;
                $n = $this->valueLength($value);
                for ($i = 0; $i < $n-1; $i++) {
                    if (!isset($tmp[$value[$i]]))
                        return NULL;
                    if (is_null($tmp[$value[$i]]->next))
                        return NULL;
                    $tmp = $tmp[$value[$i]]->next;
                }
                if (isset($tmp[$value[$n-1]]))
                    return $tmp[$value[$n-1]];
                return NULL;
            }
            
            public function printTries($subtrie=0, $spaces="") {
                if ($subtrie === 0)
                    $subtrie = $this->root;
                foreach ($subtrie as $a => $v) {
                    echo "<br>" . $spaces . "[" . $a . "]" . " => ";
                    if (!is_null($subtrie[$a]))
                        echo $subtrie[$a]->value;
                    if (!is_null($subtrie[$a]) and !is_null($subtrie[$a]->next))
                        $this->printTries($subtrie[$a]->next, $spaces . "=====");
                }
            }
        }?>
        <p><b>Inputs</b></p>
        <p>hello</p>
        <p>hi</p>
        <p>hit</p>
        <p>hel</p>
        <p>hol</p>
        <p>lol</p>
        <p>hard</p>
        <p>hardwork</p>
        <p>hitcliff</p>
        <p>hitclod</p>
        <?php
        $hashTries = new HashTries();
        $hashTries->insert("hello");
        $hashTries->insert("hi");
        $hashTries->insert("hit");
        $hashTries->insert("hel");
        $hashTries->insert("hol");
        $hashTries->insert("lol");
        $hashTries->insert("hard");
        $hashTries->insert("hardwork");
        $hashTries->insert("hitcliff");
        $hashTries->insert("hitclod");
        $hashTries->printTries();

        // $hashTries->printTries($hashTries->search("hard"));
        echo "<br>";
        ?>
        <p>Searching "hard"</p>
        <?php
        $res = $hashTries->search("hard");
        echo "$res->value<br>";
        $hashTries->printTries($hashTries->search("hard")->next);
    ?>
</body>
</html>