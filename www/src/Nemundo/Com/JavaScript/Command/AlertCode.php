<?php

namespace Nemundo\Com\JavaScript\Command;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;

class AlertCode extends AbstractJavaScriptCode
{

    /**
     * @var string
     */
    public $message;



    public function getContent()
    {

        $this->addCodeLine('alert("'.$this->message.'");');

        //$this->addHtml('asdf');


       return parent::getContent();
    }

}