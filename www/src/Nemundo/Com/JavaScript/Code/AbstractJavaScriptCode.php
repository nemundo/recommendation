<?php

namespace Nemundo\Com\JavaScript\Code;


//use Nemundo\Html\Header\JavaScriptHeaderCode;


use Nemundo\Html\Script\JavaScriptHeaderCode;

abstract class AbstractJavaScriptCode extends JavaScriptHeaderCode
{

    /**
     * @var AbstractJavaScriptCode[]
     */
    protected $codeList = [];


    private $codeLineList = [];

    private $preLineList = [];

    private $afterLineList = [];


    protected function addPreLine($line)
    {

        $this->preLineList[] = $line;

    }


    public function addCodeLine($line)
    {

        $this->codeLineList[] = $line;
        return $this;

    }


    protected function addAfterLine($line)
    {
        $this->afterLineList[] = $line;
    }


    public function getContent()
    {


        $html = '';

        $html .= join(PHP_EOL, $this->preLineList) . PHP_EOL;
        $html .= join(PHP_EOL, $this->codeLineList) . PHP_EOL;

        $html .= join(PHP_EOL, $this->afterLineList) . PHP_EOL;
        $this->addContent($html);


        return parent::getContent();

    }


    // addContainer ???
    // Parameter
    public function addCode(AbstractJavaScriptCode $code)
    {
        $this->codeList[] = $code;
        return $this;
    }


}