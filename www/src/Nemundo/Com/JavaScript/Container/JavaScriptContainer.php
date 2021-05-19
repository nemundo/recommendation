<?php

namespace Nemundo\Com\JavaScript\Container;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Script\JavaScript;

class JavaScriptContainer extends AbstractJavaScriptCode  // JavaScript
{

    /**
     * @var CodeJavaScript
     */
    private $javaScript;

    public function __construct(AbstractHtmlContainer $parentContainer = null)
    {
        //parent::__construct($parentContainer);

        $this->javaScript = new CodeJavaScript($parentContainer);

        //$parentContainer->addContainer($this);

    }


    public function addCode(AbstractJavaScriptCode $code) {


        $this->javaScript->addCode($code);

        /*
        foreach ($code->getCode() as $line) {
            //$this->addCodeLine($line);
            $this->javaScript->addCodeLine($line);
        }*/


    }

}