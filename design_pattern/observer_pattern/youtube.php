<?php

// youtube 訂閱 與 發更新內容


interface IObserver
{
    public function update();
}

interface ISubject
{
    public function notify();
    public function addCustomer(IObserver $customer);
}

class Youtube implements ISubject
{
    /**
     * @var IObserver[]
     */
    private $customers;

    private $content;

    public function updateContent(string $content)
    {
        $this->content = $content;
        $this->notify();
    }

    public function notify()
    {
        foreach ($this->customers as $customer) {
            $customer->update();
        }
    }

    public function addCustomer(IObserver $customer)
    {
        $this->customers[] = $customer;
    }

}
class Customer implements IObserver
{
    public function update()
    {
        echo '更新嚕';
    }
}

$c1 = new Customer();
$c2 = new Customer();

$youtube = new Youtube();

$youtube->addCustomer($c1);
$youtube->addCustomer($c2);

$youtube->updateContent('更新影片');