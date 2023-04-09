<?php

namespace Test\Unit;

use Garden\Tree;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class TreeTest extends TestCase {

    /**
     * @var Tree
     * Экземпляр класса Tree
     */
    private Tree $object;
    /**
     * @var int
     * Регистрационный номер дерева
     */
    private static int $i = 7;
    /**
     * @return void
     * Метод вызывается перед каждым тестом.
     */
    protected function setUp(): void
    {
        self::$i++;
        $this->object = new Tree(static::$i,'apple', 43);
    }

    /**
     * @return void
     * Тестируем соответсвенный метод класса.
     */
    public function testGetRegNumber() {
        $this->assertEquals(self::$i, $this->object->getRegNumber());
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
     * @throws \ReflectionException
     * Метод тестирует добавление регистрационного номера.
     */
    public function testAddRegNumber()
    {
        $regNumber = 789;
        $tree = new ReflectionClass('Garden\Tree');
        $method = $tree->getMethod('addRegNumber');
        $method->setAccessible(true);
        $obj = new Tree($regNumber, "apple", 45);
        $this->assertContains($regNumber, $obj->getRegNumbers());

        $this->expectException('Exception');
        $result = $method->invoke($obj, $regNumber);
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
