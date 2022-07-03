<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/16
 * Time: 下午 05:06
 */


class Mp3Player implements MediaPlayerInterface
{
    public function play()
    {
        echo 'playing mp3 <br>';
    }
}
