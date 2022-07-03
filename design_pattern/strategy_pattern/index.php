<?php

/*
 * 策略模式是对象的行为模式，用意是对一组算法的封装。动态的选择需要的算法并使用。
 * 策略模式指的是程序中涉及决策控制的一种模式。
 * 策略模式功能非常强大，因为这个设计模式本身的核心思想就是面向对象编程的多形性思想。
 *
 * 策略模式不决定在何时使用何种算法，算法的选择由客户端来决定
 */


interface StrategyInterface
{
    public function doOperation(float $num1, float $num2): float;
}

class AddStrategyInterface implements StrategyInterface
{

    public function doOperation(float $num1, float $num2): float
    {
        return $num1 + $num2;
    }
}

class SubStrategyInterface implements StrategyInterface
{

    public function doOperation(float $num1, float $num2): float
    {
        return $num1 - $num2;
    }
}

class Context
{
    private $strategy;

    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function exec(float $num1, float $num2)
    {
        echo $this->strategy->doOperation($num1, $num2) . PHP_EOL;
    }
}


// 客戶端
$context = new Context(new AddStrategyInterface());
$context->exec(5.5, 10);

$context = new Context(new SubStrategyInterface());
$context->exec(5.5, 10);

