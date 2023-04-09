<?php

namespace Garden;
use PHPUnit\Logging\Exception;

class Tree
{
    /**
     * @var int
     * Уникальный регистрационный номер дерева
     */
    private int $regNumber;
    /**
     * @var string
     * Тип дерева (яблоко/груша)
     */
    private string $type;
    /**
     * @var int
     * Кол-во фруктов на дереве.
     */
    private int $fruitCount;
    /**
     * @var array
     * Массив всех регистрационных номеров.
     */
    public static array $regNumbers = [];
    /**
     * @param int $regNumber
     * @param string $type
     * @param int $fruitCount
     */
    public function __construct(int $regNumber, string $type, int $fruitCount )
    {
        $this->regNumber = $regNumber;
        $this->type = $type;
        $this->fruitCount = $fruitCount;
        static::addRegNumber($regNumber);
    }

    /**
     * @return int
     * Метод возвращает регистранционный номер дерева.
     */
    public function getRegNumber(){
        return $this->regNumber;
    }

    /**
     * @return string
     * Метод возвращает тип дерева.
     */
    public function getType(){
        return $this->type;
    }

    /**
     * @return int
     * Метод возвращает кол-во фруктов на дереве.
     */
    public function getFruitCount(){
        return $this->fruitCount;
    }

    /**
     * @return int
     * Метод возвращает вес фруктов на дереве.
     */
    public function fruitWeights(): int
    {
        $fruitWeight = 0;
        $minmax = $this->type === "apple" ? ["min" => 150, "max" => 180] : ["min" => 130, "max" => 170];
        for($i = 0; $i < $this->fruitCount; $i++){
            $fruitWeight += rand($minmax["min"], $minmax["max"]);
        }
        return $fruitWeight;
    }

    /**
     * @return int
     * Метод возвращает кол-во фруктов на дереве и обнуляет счетчик фруктов на этом дереве.
     */
    public function collectFruits(): int
    {
        $fruitCount = $this->fruitCount;
        $this->fruitCount = 0;
        return $fruitCount;
    }

    /**
     * @param int $regNumber
     * @return void
     * Метод добавляет регистрационных номер в текущего дерева в массив номеров.
     */
    private static function addRegNumber(int $regNumber):void
    {
        if(in_array($regNumber, static::$regNumbers)){
                throw new Exception("Register number is not unique");
        }
        static::$regNumbers[] = $regNumber;
    }

    /**
     * @return array
     */
    public static function getRegNumbers(): array
    {
        return self::$regNumbers;
    }
}
