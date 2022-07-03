<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/1/7
 * Time: 上午 11:35
 */

class ImageFile extends FileBase
{
    private $docName;

    public function __construct(string $name)
    {
        $this->docName = $name;
    }

    public function display()
    {
        echo '我是图片' . $this->docName . PHP_EOL;
    }
}
