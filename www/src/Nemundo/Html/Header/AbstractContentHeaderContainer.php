<?php

namespace Nemundo\Html\Header;


use Nemundo\Core\Language\Translation;

class AbstractContentHeaderContainer extends AbstractHeaderHtmlContainer
{

    /**
     * @var string|string[]
     */
    public $content;


    public function getContent()
    {

        $this->returnOneLine = true;

        $content = (new Translation())->getText($this->content);
        $this->addContent($content);

        return parent::getContent();

    }

}