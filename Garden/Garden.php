<?php


namespace Garden;
class Garden
{
    private static  array  $trees = [];
    private static array $types = [];
    public static function addTree(Tree $tree): void
    {
        static::$trees[] = $tree;
        if(!in_array($type = $tree->getType(), static::$types)){
            static::$types[] = $type;
        }
    }

    public static function getTreesCount(): int
    {
        return count(static::$trees);
    }
    public static function getTrees(): array
    {
        return static::$trees;
    }

    public static function collectFruitWeights(): array
    {
        $fruitWeights = [];
        foreach (static::$trees as $tree) {
            if(!isset($fruitWeights[$type = $tree->getType()])){
                $fruitWeights[$type] =  $tree->fruitWeights();
                continue;
            }
            $fruitWeights[$type] +=  $tree->fruitWeights();
        }
        return $fruitWeights;
    }
    public static function collectTreesFruits(): array
    {
        $fruits = [];
        foreach (static::$trees as $tree){
            if(!isset($fruits[$type = $tree->getType()])){
                $fruits[$type] =  $tree->collectFruits();
                continue;
            }
                $fruits[$type] +=  $tree->collectFruits();
        }
        return $fruits;
    }
}