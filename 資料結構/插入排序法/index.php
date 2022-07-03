<?php

/**
 * Insertion Sort
 * @link https://www.runoob.com/data-structures/insertion-sort.html
 */

$arr = range(1,20);
$old = $arr;
shuffle($arr);
echo implode(', ', $arr) . PHP_EOL;



/*
 * 重點:
 * 1. 「往前」「兩兩比」前面全部的數值
 *
 * 7,6,9,3,1,5,2,4
 *
 * 6跟7比, 6<7, 交換 -> 6,7,9,3,1,5,2,4
 *
 * 9跟7比, 不變
 *
 * 3跟9比, 3<9, 交換 -> 6,7,3,9,1,5,2,4
 * 3跟7比, 3<7, 交換 -> 6,3,7,9,1,5,2,4
 * 3跟6比, 3<6, 交換 -> 3,6,7,9,1,5,2,4
 * 再來是1
 * 1跟9比, 1<9, 交換 -> 3,6,7,1,9,5,2,4
 * 1跟7比, 1<7, 交換 -> 3,6,1,7,9,5,2,4
 * 1跟6比, 1<6, 交換 -> 3,1,6,7,9,5,2,4
 * 1跟3比, 1<3, 交換 -> 1,3,6,7,9,5,2,4
 *
 * 再來是5
 * ...
 * 再來是2
 * ...
 * 再來是4
 * ...
 */


//0,1,2,3,4,5,6,7  key
//3,6,7,9,1,5,2,4
// i = 4
$count = count($arr);
for ($i = 0; $i < $count; $i++) {
    for ($j = $i; $j > 0; $j--) {
        if ($arr[$j] < $arr[$j-1]) {
            swap($arr, $j, $j-1);
        } else {
            break;
        }
    }
}


echo implode(', ', $arr);

function swap(&$arr, $i, $j)
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}