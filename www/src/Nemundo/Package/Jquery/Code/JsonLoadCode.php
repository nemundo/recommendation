<?php

namespace Nemundo\Package\Jquery\Code;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;
use Nemundo\Web\Site\AbstractJsonSite;

class JsonLoadCode extends AbstractJavaScriptCode
{

    /**
     * @var AbstractJsonSite
     */
    public $jsonSite;

    /**
     * @var string
     */
    public $jsParameter = '';


    public function addCodeLine($line)
    {
        return parent::addCodeLine($line);
    }


    public function getContent()
    {

        $this->addPreLine('$("body").css("cursor", "progress");');
        $this->addPreLine(' $.getJSON( "' . $this->jsonSite->getUrl() . '"' . $this->jsParameter . ', function( data ) {');

        $this->addAfterLine('$("body").css("cursor", "default");');
        $this->addAfterLine('});');

        return parent::getContent();

    }

}