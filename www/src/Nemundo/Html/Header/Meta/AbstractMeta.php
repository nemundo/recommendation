<?php

namespace Nemundo\Html\Header\Meta;


use Nemundo\Html\Header\AbstractHeaderHtmlContainer;

abstract class AbstractMeta extends AbstractHeaderHtmlContainer
{

    protected $name;

    protected $content;

    public function getContent()
    {

        $this->tagName = 'meta';
        $this->renderClosingTag = false;

        $this->addAttribute('name', $this->name);
        $this->addAttribute('content', $this->content);

        return parent::getContent();

    }

}