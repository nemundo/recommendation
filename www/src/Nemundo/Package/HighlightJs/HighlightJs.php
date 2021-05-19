<?php

namespace Nemundo\Package\HighlightJs;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Html\Typography\Code;


class HighlightJs extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $language;

    use LibraryTrait;

    public function getContent()
    {

        $this->tagName = 'pre';

        $code = new Code($this);
        $code->addCssClass($this->language);
        $code->content = $this->code;

        $this->addCssUrl('//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css');
        $this->addJsUrl('//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js');

        $script = new JavaScript($this);
        $script->addCodeLine('hljs.initHighlightingOnLoad();');

        return parent::getContent();
    }

}