<?php

/**
 * 快速排序法
 * @link https://alrightchiu.github.io/SecondRound/comparison-sort-quick-sortkuai-su-pai-xu-fa.html
 *
 * 選定一個 pivot
 * pivot 的左邊要比 pivot 值小
 * pivot 的右邊要比 pivot 值大
 *
 *       9, 4, 1, 6, 7, 3, 8, 2, 5
 *       9>5 不變
 *       9, 4, 1, 6, 7, 3, 8, 2, 5
 *       4<5 換 9,4換
 *       4, 9, 1, 6, 7, 3, 8, 2, 5
 *       1<5, 9,1換
 *       4, 1, 9, 6, 7, 3, 8, 2, 5
 *       6>5 不變
 *       4, 1, 9, 6, 7, 3, 8, 2, 5
 *       7>5 不變
 *       4, 1, 9, 6, 7, 3, 8, 2, 5
 *       3<5 換 9,3
 *       4, 1, 3, 6, 7, 9, 8, 2, 5
 *       8>5 不變
 *       4, 1, 3, 6, 7, 9, 8, 2, 5
 *       2<5 換 6,2
 *       4, 1, 3, 2, 7, 9, 8, 6, 5
 *
 *
 */
//$arr = [9, 4, 1, 6, 7, 3, 8, 2, 5];

$arr = range(1,20);
$old = $arr;
shuffle($arr);
echo implode(', ', $arr) . PHP_EOL;



$front_index = 0; // 陣列的開始
$end_index = count($arr) - 1; // 陣列的尾巴

quickSort($arr, $front_index, $end_index);

echo implode(', ', $arr) . PHP_EOL;

function quickSort(&$arr, $_front_index, $_end_index)
{
    if ($_front_index > $_end_index) {
        return;
    }

    $front_index = $_front_index;
    $end_index = $_end_index;

    $left_side_count = $_front_index - 1;
    $pivot_index = $end_index;

    for (; $front_index <= $end_index; $front_index++) {
        if ($front_index === $end_index) {
            $left_side_count++;
            swap($arr, $end_index, $left_side_count);
        }
        if ($arr[$front_index] < $arr[$pivot_index]) {
            $left_side_count++;
            swap($arr, $front_index, $left_side_count);
        }
    }

    $pivot_index = $left_side_count;

    // left side sort
    quickSort($arr, $_front_index, $pivot_index - 1);
    // right side sort
    quickSort($arr, $pivot_index + 1, $_end_index);
}

function swap(&$arr, $i, $j)
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}
