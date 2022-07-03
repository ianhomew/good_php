<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/17
 * Time: 下午 06:20
 */

class NullObject
{

    public function __call( $name, $arguments )
    {
        return 'Only accept Phper';
    }
}
