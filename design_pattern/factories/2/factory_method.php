<?php

/*
 * 工廠方法模式
 * 一個具體的工廠類負責建立一個具體的物件類型
 */


interface Factory
{
    public function createCarBenz(): Car;
    public function createCarBMW(): Car;
}

class ConcreteFactory implements Factory
{
    public function createCarBenz(): Car
    {
        return new ConcreteCarBenz();
    }
    public function createCarBMW(): Car
    {
        return new ConcreteCarBMW();
    }
}

interface Car
{
    public function carBrand();
}

class ConcreteCarBenz implements Car
{
    public function carBrand()
    {
        echo 'created Benz' . PHP_EOL;
    }
}
class ConcreteCarBMW implements Car
{
    public function carBrand()
    {
        echo 'created BMW' . PHP_EOL;
    }
}

$concreteFactory = new ConcreteCarFactory();
$benz = $concreteFactory->createCarBenz();
$benz->carBrand();


$concreteFactory = new ConcreteCarFactory();
$bmw = $concreteFactory->createCarBMW();
$bmw->carBrand();