<?php

namespace Test\Unit;

use Garden\Tree;
use PHPUnit\Framework\TestCase;

class TreeTest extends TestCase {

    /**
     * @var Tree
     * Экземпляр класса Tree
     */
    private Tree $object;

    /**
     * @return void
     * Метод вызывается перед каждым тестом.
     */
    protected function setUp(): void
    {
        $this->object = new Tree(1,'apple', 43);
    }

    /**
     * @return void
     * Тестируем соответсвенный метод класса.
     */
    public function testGetRegNumber() {
        $this->assertEquals(1, $this->object->getRegNumber());
    }

    /**
     * @return void
     * Тестируем соответсвенный метод класса.
     */
    public function testGetType() {
        $this->assertEquals('apple', $this->object->getType());
    }

    /**
     * @return void
     * Тестируем соответсвенный метод класса.
     */
    public function testGetFruitCount() {
        $this->assertEquals(43, $this->object->getFruitCount());
    }

    /**
     * @return void
     * Тестируем соответсвенный метод класса.
     */
    public function testFruitWeights() {
        $fruitWeight = $this->object->fruitWeights();
        $this->assertGreaterThanOrEqual(43 * 150, $fruitWeight);
        $this->assertLessThanOrEqual(43 * 180, $fruitWeight);
    }

    /**
     * @return void
     * Тестируем соответсвенный метод класса.
     */
    public function testCollectFruits() {
        $collectedFruits = $this->object->collectFruits();
        $this->assertEquals(43, $collectedFruits);
        $this->assertEquals(0, $this->object->getFruitCount());
    }

    /**
     * @return void
     * Метод вызывается после каждого теста.
     */
    protected function tearDown(): void
    {
        unset($this->object);
    }
}
