<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/16
 * Time: 下午 05:11
 */


class MovPlayer implements OtherMediaInterface
{
    const TYPE = 'MOV';

    public function playMov()
    {
        echo 'playing mov <br>';
    }
    public function playMp4()
    {
        // TODO: Implement playMp4() method.
    }
}
