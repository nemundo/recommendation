<?php

namespace Nemundo\Html\Header;


class Title extends AbstractContentHeaderContainer
{

    public function getContent()
    {

        $this->tagName = 'title';
        $this->returnOneLine = true;

        return parent::getContent();

    }

}