<?php


namespace Garden;// Test
class Garden
{
    /**
     * @var array|Tree
     * Массив деревьев( объектов класса Tree) в саду.
     */
    private static  array|Tree $trees = [];
    /**
     * @var array
     * Массив типов деревьев с саду.
     */
    private static array $types = [];

    /**
     * @param Tree $tree
     * @return void
     * Метод принимает экземпляр класс Tree и добавляет его в массив деревьев,
     * также добавляет тип дерева, если он еще не был добавлен.
     */
    public static function addTree(Tree $tree): void
    {
        static::$trees[] = $tree;
        if(!in_array($type = $tree->getType(), static::$types)){
            static::$types[] = $type;
        }
    }

    /**
     * @return int
     * Метод возвращает кол-во деревбев в саду.
     */
    public static function getTreesCount(): int
    {
        return count(static::$trees);
    }

    /**
     * @return array
     * Метод возвращает вес фруктов, сортируя их по типам деревьев.
     */
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

    /**
     * @return array
     * Метод возвращает кол-во фуктов, разделяя их по типам.
     */
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