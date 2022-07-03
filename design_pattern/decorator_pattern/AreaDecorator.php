<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/9
 * Time: 上午 11:46
 */

include_once 'AbstractArea.php';

abstract class AreaDecorator extends AbstractArea
{
    /** @var AbstractArea $area */
    protected $area;

    /**
     * 装饰者模式 很重要的是把继承的 AbstractArea
     * 在 抽象装饰的建构子内 注入
     * 并且在注入后 把对象给变数
     *
     * 装饰模式就是给一个对象增加一些新的功能，而且是动态的，
     * 要求装饰对象和被装饰对象实现同一个接口，
     * 装饰对象持有被装饰对象的实例
     *
     * AreaDecorator constructor.
     *
     * @param AbstractArea $area
     */
    public function __construct( AbstractArea $area )
    {
        $this->area = $area;
    }
}
