<?php


include_once 'Forest.php';
include_once 'Desert.php';
include_once 'DamagedArea.php';
include_once 'MoreProfit.php';

echo '森林的价值';
echo '<br>';
echo (new Forest())->treasure();
echo '<br>';

echo '沙漠的价值';
echo '<br>';
echo (new Desert())->treasure();
echo '<br>';


/*
 * 装饰模式是以对客户透明的方式动态地给一个对象附加上更多的职责。
 * 这也就是说，客户端并不会觉得对象在装饰前和装饰后有什么不同。
 * 装饰模式可以在不使用创造更多子类的情况下，将对象的功能加以扩展。
 */


echo '被破坏的森林的价值';
echo '<br>';
$forest = new Forest();

// 在这里不需要创建子类: 被破坏的森林 或 被破坏的沙漠 而只需要有一个 被破坏的区域及可
$damaged = new DamagedArea($forest);
echo $damaged->treasure();
echo '<br>';


echo '更有价值的森林的价值';
echo '<br>';
$forest = new Forest();
// 在这里不需要创建子类: 更有价值的森林 或 更有价值的沙漠 而只需要有一个 更有价值的类及可
$moreProfit = new MoreProfit($forest);
echo $moreProfit->treasure();
echo '<br>';

