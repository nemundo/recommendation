<?php

namespace Nemundo\Html\Header\Link;


class StylesheetLink extends AbstractLink
{

    public function getContent()
    {

        $this->tagName = 'link';
        $this->renderClosingTag = false;
        $this->rel = 'stylesheet';

        return parent::getContent();
    }

}