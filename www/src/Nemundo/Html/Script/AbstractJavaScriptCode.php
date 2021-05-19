<?php

namespace Nemundo\Html\Script;


use Nemundo\Html\Header\AbstractHeaderHtmlContainer;


class AbstractJavaScriptCode extends AbstractHeaderHtmlContainer
{


    // addLine
    // addHtml
    // addCode
    protected function addCodeLine($line)
    {
        $this->addContent($line);
        return $this;
    }


    public function getContent()
    {

        $this->tagName = 'script';
        $this->addAttribute('type', 'text/javascript');

        return parent::getContent();

    }

}