<?php

namespace Nemundo\Package\Jquery\Event;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Container\AbstractContainer;

class ClickJqueryEvent extends AbstractJqueryEvent
{


    public function __construct(AbstractContainer $parentContainer = null)
    {
        $this->eventName = 'click';
        parent::__construct($parentContainer);
    }


    /*
    public function __construct($parentContainer = null)
    {

        if ($parentContainer == null) {
            $parentContainer = LibraryTrait::$readyCode;
        }

        parent::__construct($parentContainer);
        $this->eventName = 'click';

    }

    /*
    public function __construct(AbstractJavaScriptCode $parentContainer = null)
    {

        parent::__construct($parentContainer);
        $this->eventName = 'click';

    }*/


}