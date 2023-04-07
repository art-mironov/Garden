<?php

include "Garden/Garden.php";
include "Garden/Tree.php";

use Garden\Garden;
use Garden\Tree;


for ($i = 0; $i < 10; $i++){
    Garden::addTree(new Tree($i, "apple", rand(40,50)));
}

for($j = 0;$j < 15; $j++, $i++){
    Garden::addTree(new Tree($i, "pear", rand(0,20)));
}

$fruitWeights = Garden::collectFruitWeights();
$fruits = Garden::collectTreesFruits();

echo "Кол-во яблок: " . $fruits['apple'] . "\n";
echo "Кол-во груш: " . $fruits['pear'] . "\n";

echo "Суммарный вес яблок: " . $fruitWeights['apple'] . "г" . "\n";
echo "Суммарный вес груш: " . $fruitWeights['pear'] . "г" . "\n";