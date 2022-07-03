<?php

/*
 * 优点： 1、封装不变部分，扩展可变部分。 2、提取公共代码，便于维护。 3、行为由父类控制，子类实现。
 * 缺点：每一个不同的实现都需要一个子类来实现，导致类的个数增加，使得系统更加庞大。
 * 使用场景： 1、有多个子类共有的方法，且逻辑相同。 2、重要的、复杂的方法，可以考虑作为模板方法。
 * 注意事项：为防止恶意操作，一般模板方法都加上 final 关键词。
 */


abstract class Game
{
    abstract protected function initialize();
    abstract protected function start();
    abstract protected function end();

    // 因為要固定流程 所以是不給修改的
    final public function play(): void
    {
        $this->initialize();
        $this->start();
        $this->end();
    }
}

class FootBallGame extends Game
{

    protected function initialize()
    {
        echo '足球遊戲初始化' . PHP_EOL;
    }

    protected function start()
    {
        echo '開始足球遊戲' . PHP_EOL;
    }

    protected function end()
    {
        echo '結束足球遊戲' . PHP_EOL;
    }
}

class FishGame extends Game
{

    protected function initialize()
    {
        echo '捕魚遊戲初始化' . PHP_EOL;
    }

    protected function start()
    {
        echo '開始捕魚遊戲' . PHP_EOL;
    }

    protected function end()
    {
        echo '結束捕魚遊戲' . PHP_EOL;
    }
}

$footGame = new FootBallGame();
$footGame->play();

$fishGame = new FishGame();
$fishGame->play();


