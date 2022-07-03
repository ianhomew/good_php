<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/28
 * Time: 下午 08:56
 */


// 实作 考生 报考地址
// 很多的考生会有相同的报考地址
// 在这里我们把每个考生报考的地址储存下来 如果下一个考生的报考地址已经存在 就直接返回
// 这其实有点像 singleton
// https://www.jianshu.com/p/6f70a72d2476

// 通常将内部状态作为享元类的成员变量，而外部状态通过注入的方式添加到享元类中

abstract class FlyWeight
{
    protected $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function operation() {

    }
}

class ConcreteFlyWeight extends FlyWeight
{
    public function operation()
    {
        echo '考试地址:' . $this->address . PHP_EOL;
    }
}

class UnShareConcreteFlyWeight extends FlyWeight
{

}


// 享元工厂类的作用在于提供一个用于存储享元对象的享元池
class FlyWeightFactory
{
    static $students = [];

    public static function getFlyWeight($address): FlyWeight
    {
        if (isset(self::$students[$address])) {
            echo $address . ' exist' . PHP_EOL;
            return self::$students[$address];
        }

        echo $address . ' NOT exist' . PHP_EOL;
        self::$students[$address] = new ConcreteFlyWeight($address);

        return self::$students[$address];
    }
}

$student1 = FlyWeightFactory::getFlyWeight('台北');
$student2 = FlyWeightFactory::getFlyWeight('台中');
$student3 = FlyWeightFactory::getFlyWeight('桃源');
$student4 = FlyWeightFactory::getFlyWeight('台北'); // 上面有了

$student1->operation();
$student2->operation();
$student3->operation();
$student4->operation();
