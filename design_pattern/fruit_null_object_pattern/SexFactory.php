<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/17
 * Time: 下午 08:54
 */

namespace fruit\null_object_pattern;

class SexFactory
{
    public static function make( string $sex, int $age, int $tall )
    {
        if ($sex === 'male') {
            return new Male($age, $tall);
        }

        return new NullObject();
    }
}
