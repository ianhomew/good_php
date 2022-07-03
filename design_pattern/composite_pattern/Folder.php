<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/1/7
 * Time: 上午 11:27
 */

class Folder extends FileBase
{
    private $docName;
    /** @var FileBase[] */
    private $files;

    public function __construct(string $name)
    {
        $this->docName = $name;
    }

    public function display()
    {
        echo '我是文件夹' . $this->docName . PHP_EOL;
        foreach ($this->files as $file) {
            echo $file->display();
        }
    }

    public function addFile( FileBase $file)
    {
        $this->files[spl_object_hash($file)] = $file;
    }

    public function removeFile( FileBase $file)
    {
        unset($this->files[spl_object_hash($file)]);
    }


}
