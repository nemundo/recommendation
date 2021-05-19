<?php


namespace Nemundo\Package\NemundoJs;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\JavaScript\Code\JavaScriptCode;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Header\JavaScriptHeaderCode;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Web\WebConfig;

class NemundoJsScript extends JavaScriptHeaderCode  // JavaScript  // AbstractContainer
{

    //use LibraryTrait;


    public function getContent()
    {
        //$this->addJavaScript('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');

      $this->addCodeLine('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');
        //$this->addJavaScript('let webUrl = "' . WebConfig::$webUrl . '";');
        return parent::getContent();

    }

}