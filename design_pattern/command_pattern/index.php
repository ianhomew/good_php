<?php

/*
 * 這個有點難
 * 是對「行爲」進行封裝的典型模式
 * 將命令的命令接收(請求操作者)跟執行命令(實際操作者)之間切分開來。
 * 幾乎所有的類別都可以套用命令模式，但是只有在需要某些特殊功能，
 * 如記錄操作步驟、取消上次命令的時候，比較適合用命令模式。
 *
 * 優點：
 * 它能較容易的設計一個命令「序列」。
 * 在需要的狀況下，可以較容易的將命令記入日誌。
 * 允許接收請求的一方決定是否要否決請求。
 * 可以容易的實現對請求的取消和重做。
 * 由於加進新的具體命令類別不影響其他類別，因此增加新的具體命令類別很容易。
 *
 * 最大的優點是將請求的物件和執行的物件分開。
 */


// 定義好一個動作
interface CommandInterface
{
    public function execute();
}

class Receiver
{
    public function action()
    {
        echo "執行命令1";
    }
}

// 具體的動作
class ConcreteCommand implements CommandInterface
{
    private $receiver;


    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }


    public function execute()
    {
        $this->receiver->action();
    }
}

class Invoker
{
    private $command;

    public function __construct(CommandInterface $command)
    {
        $this->command = $command;
    }

    public function action()
    {
        $this->command->execute();
    }
}


$invoker = new Invoker(new ConcreteCommand(new Receiver()));

$invoker->action();;