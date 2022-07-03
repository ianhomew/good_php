<?php

/*
 * 今天家裡請了佣人 我希望他做事的時候按照以下流程
 * 先把陽台的衣服收進來
 * 把髒衣服拿去洗衣機洗
 * 摺好乾淨的衣服
 * 洗好後曬衣服
 * 接著要掃地
 * 拖地 如果太髒 要用吸塵器吸過一遍再拖地
 *
 * 完美的一天就此結束
 */


class Servant
{
    public function collectCleanClothes()
    {
        echo '把陽台的衣服收進來' . PHP_EOL;
    }

    public function washDirtyClothes()
    {
        echo '髒衣服拿去洗衣機洗' . PHP_EOL;
    }

    public function foldingClothes()
    {
        echo '摺好乾淨的衣服' . PHP_EOL;
    }

    public function dryClothes()
    {
        echo '曬衣服' . PHP_EOL;
    }

    public function cleanFloor()
    {
        echo '掃地' . PHP_EOL;
    }

    public function vacuum()
    {
        // 是佣人自己決定要不要用吸塵器
        if (random_int(1, 100) > 50) {
            echo '太髒, 用吸塵器吸過一遍' . PHP_EOL;
        } else {
            echo '掃完沒有很髒嚕' . PHP_EOL;
        }

    }

    public function mopFloor()
    {
        echo '拖地' . PHP_EOL;
    }

    public function done()
    {
        echo '傭人沒事幹嚕' . PHP_EOL;
    }

}

interface ServantCommandInterface
{
    public function execute(): void;
}

class CollectCleanClothes implements ServantCommandInterface
{
    private $servant;

    public function __construct(Servant $servant)
    {
        $this->servant = $servant;
    }

    public function execute(): void
    {
        $this->servant->collectCleanClothes();
    }
}

class WashDirtyClothes implements ServantCommandInterface
{
    private $servant;

    public function __construct(Servant $servant)
    {
        $this->servant = $servant;
    }

    public function execute(): void
    {
        $this->servant->washDirtyClothes();
    }
}

class FoldingClothes implements ServantCommandInterface
{
    private $servant;

    public function __construct(Servant $servant)
    {
        $this->servant = $servant;
    }

    public function execute(): void
    {
        $this->servant->foldingClothes();
    }
}

class DryClothes implements ServantCommandInterface
{
    private $servant;

    public function __construct(Servant $servant)
    {
        $this->servant = $servant;
    }

    public function execute(): void
    {
        $this->servant->dryClothes();
    }
}

class CleanFloor implements ServantCommandInterface
{
    private $servant;

    public function __construct(Servant $servant)
    {
        $this->servant = $servant;
    }

    public function execute(): void
    {
        $this->servant->cleanFloor();
    }
}

class Vacuum implements ServantCommandInterface
{
    private $servant;

    public function __construct(Servant $servant)
    {
        $this->servant = $servant;
    }

    public function execute(): void
    {
        $this->servant->vacuum();
    }
}

class MopFloor implements ServantCommandInterface
{
    private $servant;

    public function __construct(Servant $servant)
    {
        $this->servant = $servant;
    }

    public function execute(): void
    {
        $this->servant->mopFloor();
    }
}

class Done implements ServantCommandInterface
{
    private $servant;

    public function __construct(Servant $servant)
    {
        $this->servant = $servant;
    }

    public function execute(): void
    {
        $this->servant->done();
    }
}


class ServantInvoker
{
    private $servantCommands;

    public function setCommand(ServantCommandInterface $servantCommand)
    {
        $this->servantCommands[] = $servantCommand;
    }

    public function execute()
    {
        /** @var ServantCommandInterface $servantCommand */
        foreach ($this->servantCommands as $servantCommand) {
            $servantCommand->execute();
        }
        $this->servantCommands = [];
    }
}

$servant = new Servant();

$invoker = new ServantInvoker();
$invoker->setCommand(new CollectCleanClothes($servant));
$invoker->setCommand(new WashDirtyClothes($servant));
$invoker->setCommand(new FoldingClothes($servant));
$invoker->setCommand(new DryClothes($servant));
$invoker->setCommand(new CleanFloor($servant));
$invoker->setCommand(new Vacuum($servant));
$invoker->setCommand(new MopFloor($servant));

$invoker->execute();