<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/17
 * Time: 下午 05:53
 */


include 'Phper.php';
include 'Programmer.php';
include 'NewPhper.php';
include 'NewProgrammer.php';
include 'NullObject.php';


echo '================ 正常情况 ================<br>';
/** @var Phper $programmer */
$programmer = (new Programmer())->make('php');
echo 'programmer = ' . $programmer->getProgrammer() . '<br>';


//echo '================ 错误情况 ================<br>';
///** @var Phper $programmer */
//$programmer = (new Programmer())->make('java');
//// Call to a member function getProgrammer() on null
//echo 'programmer = ' . $programmer->getProgrammer() . '<br>';



$newProgrammer = (new NewProgrammer())->make('java');
// Call to a member function getProgrammer() on null
echo 'newProgrammer = ' . $newProgrammer->getProgrammer() . '<br>';

