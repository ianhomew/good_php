<?php

interface TreeInterface
{
    public function hangPrize(): string;

    public function cards(): string;
}

class ChristmasTree implements TreeInterface
{
    public function hangPrize(): string
    {
        return '沒有裝飾品的聖誕樹';
    }
    public function cards(): string
    {
        return '沒有掛上任何卡片';
    }
}

$noPrizeTree = new ChristmasTree();
echo $noPrizeTree->hangPrize();
echo $noPrizeTree->cards();


abstract class TreeDecorator implements TreeInterface
{
    /**
     * @var TreeInterface
     */
    protected $tree;

    public function __construct(TreeInterface $tree)
    {
        $this->tree = $tree;
    }
}

class OnePrizeChristmasTree extends TreeDecorator
{
    public function hangPrize(): string
    {
        return PHP_EOL . $this->tree->hangPrize() . ' 現在有一個裝飾品了' . PHP_EOL;
    }

    public function cards(): string
    {
        return PHP_EOL . $this->tree->cards() . ' 現在有一張卡片了' . PHP_EOL;
    }
}

$onePrizeChristmasTree = new OnePrizeChristmasTree(new ChristmasTree());
echo $onePrizeChristmasTree->hangPrize();
echo $onePrizeChristmasTree->cards();