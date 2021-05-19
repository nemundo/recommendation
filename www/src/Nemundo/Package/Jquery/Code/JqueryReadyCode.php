<?php

namespace Nemundo\Package\Jquery\Code;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;

class JqueryReadyCode extends AbstractJavaScriptCode
{


    // static

    public function addCodeLine($line)
    {
        return parent::addCodeLine($line);
    }


    public function getContent()
    {

        $this->addPreLine('$(document).ready(function () {');

        $this->addAfterLine('});');

        return parent::getContent();
    }

}