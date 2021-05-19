<?php

namespace Nemundo\Html\Script;


use Nemundo\Html\Container\AbstractHtmlContainer;

// BodyJavaScript
class JavaScriptBody extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $src;

    public function addContent($content)
    {
        return parent::addContent($content);
    }


    public function getContent()
    {

        $this->tagName = 'script';
        $this->addAttribute('type', 'text/javascript');
        $this->addAttribute('src', $this->src);

        return parent::getContent();

    }

}