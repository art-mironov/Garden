<?php

namespace Test\Unit;


use PHPUnit\Framework\TestCase;
use Garden\Tree;
use Garden\Garden;

class GardenTest extends TestCase
{

    /**
     * @var array|Tree
     * Массив объектов класса Tree
     */
    private array|Tree $objects = [];

    /**
     * @return void
     * Метод вызывается перед каждым тестом.
     */
    protected function setUp(): void
    {
        $this->objects[] = new Tree(1,'apple', 43);
        $this->objects[] = new Tree(2, "pear", 15);
    }

    /**
     * @return void
     * Тестирует соответствующий метод класса Garden.
     */
    public function testAddTree()
    {
        $tree1 = $this->objects[0];
        $tree2 = $this->objects[1];
        Garden::addTree($tree1);
        Garden::addTree($tree2);
        $this->assertEquals(2, Garden::getTreesCount());
    }

    /**
     * @return void
     * Тестирует соответствующий метод класса Garden.
     */
    public function testCollectFruitWeights()
    {
        $tree1 = $this->objects[0];
        $tree2 = $this->objects[1];
        Garden::addTree($tree1);
        Garden::addTree($tree2);
        $fruitWeights = Garden::collectFruitWeights();

        $this->assertArrayHasKey('apple', $fruitWeights);
        $this->assertArrayHasKey('pear', $fruitWeights);

        $this->assertGreaterThanOrEqual(43 * 2 * 150, $fruitWeights['apple']);
        $this->assertLessThanOrEqual(43 * 2 * 180, $fruitWeights['apple']);

        $this->assertGreaterThanOrEqual(15 * 2 * 130, $fruitWeights['pear'] );
        $this->assertLessThanOrEqual(15 * 2 * 170, $fruitWeights['pear']);
    }

    /**
     * @return void
     * Тестирует соответствующий метод класса Garden.
     */
    public function testCollectTreesFruits()
    {
        $tree1 = $this->objects[0];
        $tree2 = $this->objects[1];

        Garden::addTree($tree1);
        Garden::addTree($tree2);

        $fruits = Garden::collectTreesFruits();

        $this->assertArrayHasKey('apple', $fruits);
        $this->assertArrayHasKey('pear', $fruits);

        $this->assertEquals(43 * 3, $fruits['apple']);
        $this->assertEquals(15 * 3, $fruits['pear']);
    }

    /**
     * @return void
     * Вызывается после каждого теста.
     */
    protected function tearDown(): void
    {
        unset($this->objects);
    }
}