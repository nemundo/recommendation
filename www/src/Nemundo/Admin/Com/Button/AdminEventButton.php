<?php

namespace Nemundo\Admin\Com\Button;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\JavaScript\Event\AbstractJavaScriptEvent;
use Nemundo\Com\Utility\UniqueComName;
use Nemundo\Package\Bootstrap\Button\BootstrapButton;

class AdminEventButton extends BootstrapButton
{

    use LibraryTrait;


    public function addEvent(AbstractJavaScriptEvent $event)
    {

        $this->id = (new UniqueComName())->getUniqueName();
        $event->eventId = $this->id;

        $this->addJqueryCode($event);

    }

}