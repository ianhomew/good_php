<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/16
 * Time: 下午 05:21
 */


class Mp4Player implements OtherMediaInterface
{
    const TYPE = 'MP4';

    public function playMov()
    {
    }
    public function playMp4()
    {
        echo 'playing mp4 <br>';
    }
}
