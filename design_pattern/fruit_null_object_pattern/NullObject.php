<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/17
 * Time: 下午 08:55
 */

namespace fruit\null_object_pattern;

class NullObject
{
    // 这样所有 Male 内有的方法 变数 都会是 null

    public function __call( $name, $arguments )
    {
        return null;
    }

    public function __get( $name )
    {
        return null;
    }

    public static function __callStatic( $name, $arguments )
    {
        return null;
    }
}
