<?php

namespace Nemundo\Com\JavaScript\Container;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;
use Nemundo\Html\Script\JavaScript;

class CodeJavaScript extends JavaScript
{

    /**
     * @var AbstractJavaScriptCode[]
     */
    private $codeList = [];

    public function addCode(AbstractJavaScriptCode $code)
    {

        $this->codeList[] = $code;

    }


    public function getContent()
    {

        foreach ($this->codeList as $code) {
            foreach ($code->getContainerList() as $line) {
                $this->addCodeLine($line);
            }
        }

        return parent::getContent();

    }

}