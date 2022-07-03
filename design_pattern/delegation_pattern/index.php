<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/1/4
 * Time: 下午 06:14
 */

// 委托模式


/**
 * https://www.runoob.com/w3cnote/delegate-mode.html
 * 委托模式是一项基本技巧
 */


/**
 * 被委托
 * Class Junior
 */
class Junior
{
    public function writeBadCode()
    {
        echo 'Junior write bad code';
    }
}


class TeamLeader
{
    /** @var Junior $junior */
    private $junior;

    public function __construct(Junior $junior)
    {
        $this->junior = $junior;
    }

    public function writeCode()
    {
        // 在这里 team leader 不写code 让 junior 写
        $this->junior->writeBadCode();
    }

}

$junior = new Junior();

$teamLeader = new TeamLeader($junior);
$teamLeader->writeCode();
