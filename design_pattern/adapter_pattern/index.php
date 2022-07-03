<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/16
 * Time: 下午 05:07
 */


/**
 *
 * https://www.runoob.com/design-pattern/adapter-pattern.html
 * 读卡器是作为内存卡和笔记本之间的适配器。您将内存卡插入读卡器，再将读卡器插入笔记本，这样就可以通过笔记本来读取内存卡
 *
 * 适配器不是在详细设计时添加的，而是解决正在服役的项目的问题
 */

include 'autoload.php';


/*
 * 原本只需要播放 mp3
 */
echo '原始需求测试:<br>';
$mp3 = new Mp3Player();
$mp3->play();

echo '<br><br><br><br>';

/*
 * 新需求进来 需要另外支援 mp4, mov
 */
$mp4MediaPlayer = new MediaAdapter('mp4');
$mp4MediaPlayer->play();
$mp3MediaPlayer = new MediaAdapter('mp3');
$mp3MediaPlayer->play();
$movMediaPlayer = new MediaAdapter('mov');
$movMediaPlayer->play();

$dvdMediaPlayer = new MediaAdapter('dvd');
$dvdMediaPlayer->play();
