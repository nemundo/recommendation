<?php

namespace Nemundo\Html\Layout;


use Nemundo\Html\Container\AbstractHtmlContainer;


class Article extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'article';
        return parent::getContent();
    }

}
