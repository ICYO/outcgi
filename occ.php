<?php

class ConcreateSubject implements SplSubject
{
    private $Observers;
    private $Data;

    public function setObservers()
    {
        $this->Observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->Observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->Observers->detach($observer);
    }

    public function notify()
    {
        foreach($this->Observers as $objserver)
        {
            $observer->update($this);
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

class ConcreateObserver implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo $subject->getData(),'<br />';
    }
}
echo 1;