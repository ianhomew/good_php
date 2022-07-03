<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/17
 * Time: 下午 08:51
 */

namespace fruit\null_object_pattern;

class Male implements Sex
{
    private $sex;
    private $age;
    private $tall;

    public  $parentsName;

    public function __construct($age, $tall)
    {
        $this->sex = 'male';
        $this->age = $age;
        $this->tall = $tall;

        $this->parentsName = 'parent name is Bob <br>';
    }

    public function getSex()
    {
        return $this->sex . '<br>';
    }

    public function getAll()
    {
        return " {$this->sex}'s age is {$this->age}, he is {$this->tall} <br>";
    }
}
