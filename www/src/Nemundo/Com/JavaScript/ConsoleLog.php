<?php

namespace Nemundo\Com\JavaScript;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;

class ConsoleLog extends AbstractJavaScriptCode
{


    /**
     * @var string
     */
    public $message;

    /**
     * @var bool
     */
    public $includeQuote=true;

    //public function getCode()
    public function getContent()
    {


        $quote = '';
        if ($this->includeQuote) {
            $quote='"';
        }

        $this->addCodeLine('console.log('.$quote.$this->message.$quote.');');

        return parent::getContent();


    }

}