<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/1/7
 * Time: 上午 11:36
 */

class TextFile extends FileBase
{
    private $docName;

    public function __construct(string $name)
    {
        $this->docName = $name;
    }

    public function display()
    {
        echo '我是纯文字' . $this->docName . PHP_EOL;
    }
}
