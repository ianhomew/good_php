<?php

/**
 * Interface BuilderInterface
 *
 * 将一个复杂对象的构建与它的表示分离，使得同样的构建过程可以创建不同的表示，
 * 这是官方定义，通俗的说就是：
 * 建造者模式就是如何一步步构建一个包含多个组成部件的对象，相同的构建过程可以创建不同的产品
 * 还有一种场景是代替多参数构造器
 *
 * 簡單說就是 同樣的過程 拿取不同的具體產品 組合出最終的產品
 * 例如
 * 同樣的產品線 液體是洗髮精 最後產生瓶裝洗髮精
 * 液體是沐浴乳 最後產生瓶裝沐浴乳
 *
 * 或者
 * 同樣的過程 最終產生兩間不一樣大小 內裝 的房子
 */


interface BuilderInterface
{
    public function addDoors();
    public function addWheel();
    public function addEngine();

    public function getVehicle();
}