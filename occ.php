<?php


class ConcreateSubject implements \SplSubject
{
    public $Observers;
    private $Data;

    public function initObservers()
    {
        $this->Observers = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer)
    {
        $this->Observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->Observers->detach($observer);
    }

    public function notify()
    {
        foreach($this->Observers as $osv)
        {
            $osv->update($this);
        }
    }

    public function getData()
    {
        return $this->Data;
    }

    public function setData($data)
    {
        $this->Data = $data;
    }
}

class ConcreateObserver implements \SplObserver
{
    public function update(\SplSubject $subject)
    {
        echo $subject->getData(),'<br />';
    }
}


$client1 = new ConcreateObserver();
$client2 = new ConcreateObserver();
$client3 = new ConcreateObserver();

$subject = new ConcreateSubject();
$subject->initObservers();  // 初始化客户端容器

$subject->setData("第一条消息");
// 注册客户端
$subject->attach($client1);
$subject->attach($client2);
$subject->attach($client2);
$subject->attach($client3);

// print_r($subject->Observers);
$subject->notify();  // 发送消息
