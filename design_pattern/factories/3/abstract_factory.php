<?php

/*
 * 抽象工廠模式
 * 一個具體的工廠類負責建立一系列相關的物件
 */


interface AbstractFactory
{
    public function createBenz(): AbstractBenz;
    public function createBMW(): AbstractBMW;
}

class ConcreteCarFactory implements AbstractFactory
{
    public function createBenz(): AbstractBenz
    {
        return new ConcreteBenz();
    }
    public function createBMW(): AbstractBMW
    {
        return new ConcreteBMW();
    }
}
class ConcreteFactory_2 implements AbstractFactory
{
    public function createBenz(): AbstractBenz
    {
        return new ConcreteExpensiveBenz();
    }
    public function createBMW(): AbstractBMW
    {
        return new ConcreteExpensiveBMW();
    }
}

interface AbstractBenz
{
    public function carBrand();
}
interface AbstractBMW
{
    public function carBrand();
}

class ConcreteBenz implements AbstractBenz
{
    public function carBrand()
    {
        echo 'I am Benz' . PHP_EOL;
    }
}
class ConcreteBMW implements AbstractBMW
{
    public function carBrand()
    {
        echo 'I am BMW' . PHP_EOL;
    }
}

class ConcreteExpensiveBenz implements AbstractBenz
{
    public function carBrand()
    {
        echo 'I am EXPENSIVE Benz' . PHP_EOL;
    }
}
class ConcreteExpensiveBMW implements AbstractBMW
{
    public function carBrand()
    {
        echo 'I am EXPENSIVE BMW' . PHP_EOL;
    }
}

$factory = new ConcreteCarFactory();
$juice = $factory->createBMW();
$juice->carBrand();
$fruit = $factory->createBenz();
$fruit->carBrand();

echo '==========================' . PHP_EOL;


$orangeFactory = new ConcreteFactory_2();
$orangeJuice = $orangeFactory->createBMW();
$orangeJuice->carBrand();
$orange = $orangeFactory->createBenz();
$orange->carBrand();



