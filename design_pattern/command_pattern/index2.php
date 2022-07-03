<?php


// 燈泡本身擁有的行為在這裡
class Light
{
    private $isTurnOn = false;

    public function turnOn()
    {
        if ($this->isTurnOn) {
            // 否決請求
            echo 'TIPS: 已經開燈了' . PHP_EOL;
        } else {
            $this->isTurnOn = true;
            echo '開燈' . PHP_EOL;
        }
    }

    public function turnOff()
    {
        if ($this->isTurnOn) {
            $this->isTurnOn = false;
            echo '關燈' . PHP_EOL;
        } else {
            // 否決請求
            echo 'TIPS: 已經關燈了' . PHP_EOL;
        }
    }

    public function brighter()
    {
        echo '再亮一點' . PHP_EOL;
    }

    public function darker()
    {
        echo '再暗一點' . PHP_EOL;
    }
}

// 命令介面
interface LightCommandInterface
{
    public function execute(): void;
}

// 不直接 new Light -> turnOn
// 而是透過 LightCommandInterface 內的 execute 包裹 turnOn
class TurnOn implements LightCommandInterface
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->turnOn();
    }
}

class TurnOff implements LightCommandInterface
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->turnOff();
    }
}

class Brighter implements LightCommandInterface
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->brighter();
    }
}

class Darker implements LightCommandInterface
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->darker();
    }
}

// 在這裡不直接透過 Client 端調用 而是透過 LightInvoker 來做調用
// 可以把 LightInvoker 當作是控制電燈的那個「遙控器」
class LightInvoker
{
    /**
     * @var SplObjectStorage
     */
    private $lightCommands;

    public function __construct()
    {
        $this->lightCommands = new SplObjectStorage();
    }

    public function setCommand(LightCommandInterface $lightCommand)
    {
        $this->lightCommands->attach($lightCommand);
    }

    public function execute()
    {
        /** @var LightCommandInterface $lightCommand */
        foreach ($this->lightCommands as $lightCommand) {
            $lightCommand->execute();
        }

        // 這樣就可以清除全部
        $this->lightCommands->removeAllExcept(new SplObjectStorage());
    }
}


// 命令接收(請求操作者)跟執行命令(實際操作者)之間切分開來

$light = new Light();

// invoke 調用者
$lightInvoker = new LightInvoker();
$lightInvoker->setCommand(new TurnOn($light));
$lightInvoker->setCommand(new TurnOn($light));
$lightInvoker->setCommand(new Brighter($light));
$lightInvoker->setCommand(new Brighter($light));
$lightInvoker->setCommand(new Brighter($light));
$lightInvoker->setCommand(new Brighter($light));
$lightInvoker->setCommand(new Darker($light));
$lightInvoker->setCommand(new Turnoff($light));

$lightInvoker->execute();
