<?php

namespace Garden;

class Tree
{
    private int $regNumber;
    private string $type;
    private int $fruitCount;
    public function __construct(int $regNumber, string $type, int $fruitCount )
    {
        $this->regNumber = $regNumber;
        $this->type = $type;
        $this->fruitCount = $fruitCount;
    }

    public function getRegNumber(){
        return $this->regNumber;
    }

    public function getType(){
        return $this->type;
    }

    public function getFruitCount(){
        return $this->fruitCount;
    }

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
     * Метод возвращает кол-во фруктов на дереве и обнуляется.
     */
    public function collectFruits(): int
    {
        $fruitCount = $this->fruitCount;
        $this->fruitCount = 0;
        return $fruitCount;
    }
}