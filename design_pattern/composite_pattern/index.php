<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/1/7
 * Time: 上午 11:06
 */


// 组合模式（Composite Pattern），又叫部分整体模式
// 意图："将对象组合成树形结构"以表示"部分-整体"的层次结构。组合模式使得用户对单个对象和组合对象的使用具有一致性。
// 主要解决：它在我们树型结构的问题中，模糊了简单元素和复杂元素的概念，客户程序可以像处理简单元素一样来处理复杂元素，从而使得客户程序与复杂元素的内部结构解耦。
// 何时使用： 1、您想表示对象的部分-整体层次结构（树形结构）。 2、您希望用户忽略组合对象与单个对象的不同，用户将统一地使用组合结构中的所有对象。
// 如何解决：树枝和叶子实现统一接口，树枝内部组合该接口。
// 关键代码：树枝内部组合该接口，并且含有内部属性 List，里面放 Component。


include 'autoload.php';

/*
 * -- root
 *          -- 1.txt
 *          -- secondFolder
 *              -- sex.jpg
 *              -- god.jpg
 */


$rootFolder = new Folder('root');
$txt = new TextFile('1.txt');
$secondFolder = new Folder('secondFolder');
$sex = new ImageFile('sex.jpg');
$god = new ImageFile('god.jpg');

$rootFolder->addFile($txt);
$rootFolder->addFile($secondFolder);
$secondFolder->addFile($sex);
$secondFolder->addFile($god);

//$secondFolder->removeFile($sex);

$rootFolder->display();




