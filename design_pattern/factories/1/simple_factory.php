<?php

/*
 * 簡單工廠模式
 * 一個工廠方法建立不同類型的物件
 */


interface Car
{
    public function createCar();
}

class Benz implements Car
{
    public function createCar()
    {
        echo 'create Benz' . PHP_EOL;
    }
}
class BMW implements Car
{
    public function createCar()
    {
        echo 'create BMW' . PHP_EOL;
    }
}

class SimpleFactory
{
    public function create($type)
    {
        if ($type === 'Benz') {
            $benz = new Benz();
            $benz->createCar();
        } elseif ($type === 'BMW') {
            $bmw = new BMW();
            $bmw->createCar();
        }
    }
}

$simpleFactory = new SimpleFactory();
$simpleFactory->create('Benz');
$simpleFactory->create('BMW');

