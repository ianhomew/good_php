<?php

/*
 * 假設我是餐廳老闆 我要叫廚師先洗菜 切菜 炒菜 裝盤
 */

class CookActions
{
    public function wash()
    {
        echo '洗菜' . PHP_EOL;
    }
    public function cut()
    {
        echo '切菜' . PHP_EOL;
    }
    public function stirFly()
    {
        echo '炒菜' . PHP_EOL;
    }
    public function putInDish()
    {
        echo '裝盤' . PHP_EOL;
    }
}

interface CookCommandInterface
{
    public function doCook(): void;
}

class WashCommand implements CookCommandInterface
{
    private $cookActions;

    public function __construct(CookActions $actions)
    {
        $this->cookActions = $actions;
    }

    public function doCook(): void
    {
        $this->cookActions->wash();
    }

}
class CutCommand implements CookCommandInterface
{
    private $cookActions;

    public function __construct(CookActions $actions)
    {
        $this->cookActions = $actions;
    }

    public function doCook(): void
    {
        $this->cookActions->cut();
    }

}
class StirFryCommand implements CookCommandInterface
{
    private $cookActions;

    public function __construct(CookActions $actions)
    {
        $this->cookActions = $actions;
    }

    public function doCook(): void
    {
        $this->cookActions->stirFly();
    }

}
class PutInDishCommand implements CookCommandInterface
{
    private $cookActions;

    public function __construct(CookActions $actions)
    {
        $this->cookActions = $actions;
    }

    public function doCook(): void
    {
        $this->cookActions->putInDish();
    }

}

class CookInvoker
{
    private $commands;
    public function setCommand(CookCommandInterface $cookCommand)
    {
        $this->commands[] = $cookCommand;
    }

    public function execute()
    {
        /** @var CookCommandInterface $command */
        foreach ($this->commands as $command)
        {
            $command->doCook();
        }
        $this->commands[] = [];
    }
}

$actions = new CookActions();

$wash = new WashCommand($actions);
$cut = new CutCommand($actions);
$stirFly = new StirFryCommand($actions);
$putInDish = new PutInDishCommand($actions);

$invoker = new CookInvoker();
$invoker->setCommand($wash);
$invoker->setCommand($wash);
$invoker->setCommand($cut);
$invoker->setCommand($stirFly);
$invoker->setCommand($putInDish);

$invoker->execute();