<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/17
 * Time: 下午 08:49
 */

include 'autoload.php';

use fruit\null_object_pattern\SexFactory;

// 在这里我们只创建了 Male 这个类
// 不创建 Female这个类

$b1 = SexFactory::make('male', 10, 180);
echo $b1->getSex();
echo $b1->getAll();
echo $b1->parentsName;


$g1 = SexFactory::make('female', 18, 165);
echo $g1->getSex();
echo $g1->getAll();
echo $g1->parentsName;
