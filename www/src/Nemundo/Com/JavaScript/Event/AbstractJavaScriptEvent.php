<?php

namespace Nemundo\Com\JavaScript\Event;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;

class AbstractJavaScriptEvent extends AbstractJavaScriptCode
{

    /**
     * @var string
     */
    public $eventId;


    public $returnFalse = true;

    /**
     * @var string
     */
    protected $eventName;


    public function addCodeLine($line)
    {
        return parent::addCodeLine($line);
    }

}