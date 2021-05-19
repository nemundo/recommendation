<?php

namespace Nemundo\Com\JavaScript\Command;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;

class DocumentWriteCode extends AbstractJavaScriptCode
{

    /**
     * @var string
     */
    public $message;

    public function getContent()
    {


        $this->addCodeLine('document.write("message: '.$this->message.'");');

        return parent::getContent();
    }

}