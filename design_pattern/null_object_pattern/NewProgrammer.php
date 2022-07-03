<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/17
 * Time: 下午 06:03
 */

class NewProgrammer
{
    public function make(string $program)
    {
        if (! class_exists('Phper')) {
            include 'Phper.php';
        }

        if ($program === 'php') {
            return new Phper();
        }

        return new NullObject();
    }


}
