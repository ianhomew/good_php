<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/17
 * Time: 下午 06:03
 */

class Programmer
{
    public function make(string $program)
    {
        if ($program === 'php') {
            return new Phper();
        }
    }

}
