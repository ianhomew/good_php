<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/1/15
 * Time: 上午 10:06
 */


// 代理模式
// 不直接访问主要的对象 而是透过中间一层 对对象做控制
//
// 跟 适配器模式 与 装饰者模式 在结构上有点类似
// 适配器模式: 是修改接口 使不同的类以相同的接口做访问 达到一致性
// 装饰者模式: 针对一个类 给予更多能力 是一种增强类功能(能力)的方式


interface ImageInterFace
{
    public function display();
}

class RealImage implements ImageInterFace
{
    protected $imageName;
    public function __construct(string $imageName)
    {
        $this->imageName = $imageName;
    }

    public function display()
    {
        echo 'real image name is '. $this->imageName;
    }
}

class ProxyImage implements ImageInterFace
{
    protected $imageName;
    protected $realImage;

    public function __construct(string $imageName)
    {
        $this->imageName = $imageName;
        $this->realImage = new RealImage($this->imageName);
    }

    public function display()
    {
        $this->realImage->display();
    }
}


$proxyImage = new ProxyImage('test.png');
$proxyImage->display();
