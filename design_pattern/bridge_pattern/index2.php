<?php

// https://openhome.cc/Gossip/DesignPattern/BridgePattern.htm
// 橋接模式 是把一個事物的具體行為與具體的特徵 分開

// 定義抽象的概念 例如 形狀
interface ShapeInterface
{
    public function draw();

    public function resize(float $changedRadius);
}

// 定義具體的實作 例如 畫圓
interface DrawCircleInterface
{
    public function drawCircle();
}

// 實作 DrawCircle
class ConcreteBigCircle implements DrawCircleInterface
{
    public function drawCircle()
    {
        echo '畫大圓' . PHP_EOL;
    }
}
// 實作 DrawCircle
class ConcreteSmallCircle implements DrawCircleInterface
{
    public function drawCircle()
    {
        echo '畫小圓' . PHP_EOL;
    }
}

// 實作抽象的概念：形狀
class ConcreteShape implements ShapeInterface
{
    /**
     * @var float
     */
    private $radius;

    /**
     * @var DrawCircleInterface
     */
    protected $drawCircle;
    public function __construct(float $radius, DrawCircleInterface $drawCircle)
    {
        $this->radius = $radius;
        $this->drawCircle = $drawCircle;
    }

    public function draw()
    {
        $this->drawCircle->drawCircle();
    }

    public function resize(float $changedRadius)
    {
        echo "修改半徑 ---> 舊半徑：{$this->radius}, 新半徑：{$changedRadius}" . PHP_EOL;
        $this->radius = $changedRadius;
    }
}

$bigCircle = new ConcreteShape(10.5, new ConcreteBigCircle());
$bigCircle->draw();
$bigCircle->resize(20.1);

$smallCircle = new ConcreteShape(3, new ConcreteSmallCircle());
$smallCircle->draw();
$smallCircle->resize(1.1);