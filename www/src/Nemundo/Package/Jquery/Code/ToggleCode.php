<?php

namespace Nemundo\Package\Jquery\Code;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;

class ToggleCode extends AbstractJavaScriptCode
{

    /**
     * @var string
     */
    public $codeId;

    public function getContent()
    {

        $this->addCodeLine('$("#' . $this->codeId . '").toggle();');
        return parent::getContent();

    }

}