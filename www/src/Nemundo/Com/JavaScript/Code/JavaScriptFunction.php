<?php

namespace Nemundo\Com\JavaScript\Code;


class JavaScriptFunction extends AbstractJavaScriptCode
{

    /**
     * @var string
     */
    public $functionName;



    public function addCodeLine($line)
    {
        return parent::addCodeLine($line);
    }


    public function getContent()
    {

        $this->addPreLine('function ' . $this->functionName . ' {');
        $this->addAfterLine('}');

        return parent::getContent();


    }

}