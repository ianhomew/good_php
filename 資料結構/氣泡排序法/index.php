<?php

/**
 * Bubble Sort
 * @link https://emn178.pixnet.net/blog/post/93779892
 */

//$arr = [38, 49, 25, 30, 13];

$arr = range(1,20);
$old = $arr;
shuffle($arr);
echo implode(', ', $arr) . PHP_EOL;

// 重點:
// 每次都是從第一個元素開始排序 遍歷第一次陣列後 第一個最大值就被找到 且放在最後一個索引
// 遍歷第二次 一樣從第一個元素開始排序 第二個最大值就被找到 且放在倒數第二個索引

//  0  1  2  3  4
// 38,49,25,30,13 原始數據
// 38 與 49 比, 不變 結束這回合
// 38,49,25,30,13
// 49 與 25 比
// 38,25,49,30,13
// 49 與 30 比
// 38,25,30,49,13
// 49 與 13 比
// 38,25,30,13,49
//
$count = count($arr);
for ($i = 0; $i < $count; $i++) {
    for ($j = 0; $j < $count - 1; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            swap($arr, $j, $j + 1);
        }
    }
}


echo implode(', ', $arr) . PHP_EOL;


function swap(&$arr, $i, $j)
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}
