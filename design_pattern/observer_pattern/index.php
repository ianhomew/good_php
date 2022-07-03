<?php


// 假設現在有一位主管與多位員工 員工提早下班的時候主管需要知道

interface ObserverInterface
{
    public function update(Staff $staff);
}

interface SubjectInterface
{
    public function addManager(ObserverInterface $observer);
    public function notifyObserver();
}

class Staff implements SubjectInterface
{
    /**
     * @var ObserverInterface[]
     */
    private $managers;

    public $userName;
    public $isGoHome = false;
    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    public function changeStatus()
    {
        $this->isGoHome = !$this->isGoHome;
        if ($this->isGoHome) {
            $this->notifyObserver();
        }
    }

    public function notifyObserver()
    {
        foreach ($this->managers as $manager) {
            $manager->update($this);
        }
    }

    public function addManager(ObserverInterface $observer)
    {
        $this->managers[] = $observer;
    }
}

class Manager implements ObserverInterface
{
    public $userName;
    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    public function update(Staff $staff)
    {
        echo $this->userName . '知道' . $staff->userName . '要回家嚕';
    }
}

$s1 = new Staff('S1');
$s2 = new Staff('S2');

$m = new Manager('M1');

$s1->addManager($m);
$s2->addManager($m);

$s1->changeStatus();

