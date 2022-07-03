<?php


class Youtube implements SplSubject
{
    /**
     * @var SplObjectStorage
     */
    private $observers;

    /**
     * @var string 訂閱通知更新的內容
     */
    public $content;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function updateContent(string $content)
    {
        $this->content = $content;
        $this->notify();
    }

    public function getUpdateContent()
    {
        return $this->content . PHP_EOL;
    }

}

class Customer implements SplObserver
{
    /**
     * @var string
     */
    private $customerName;

    public function __construct(string $customerName)
    {
        $this->customerName = $customerName;
    }

    public function update(SplSubject $subject)
    {
        echo $this->customerName . '收到通知: ' . $subject->getUpdateContent() . PHP_EOL;
    }

}

$youtube = new Youtube();


$c1 = new Customer('C1');
$c2 = new Customer('C2');

$youtube->attach($c1);
$youtube->attach($c2);
$youtube->updateContent('新增一首歌');


echo 'C2取消訂閱' . PHP_EOL;
$youtube->detach($c2);
$youtube->updateContent('新增一部影片');
