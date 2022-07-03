<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/9
 * Time: 上午 11:49
 */

include_once 'AreaDecorator.php';

class MoreProfit extends AreaDecorator
{
    public function __construct( AbstractArea $area )
    {
        parent::__construct($area);
    }

    public function treasure()
    {
        return $this->area->treasure() * 1.3;
    }

}
