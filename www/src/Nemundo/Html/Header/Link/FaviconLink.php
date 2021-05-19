<?php

namespace Nemundo\Html\Header\Link;


use Nemundo\Html\Header\AbstractHeaderHtmlContainer;

class FaviconLink extends AbstractLink // AbstractHeaderHtmlContainer
{

    /**
     * @var string
     */
    //public $href;

    public function getContent()
    {


        $this->rel='icon';
        $this->addAttribute('type', 'image/x-icon');

        /*
        $this->tagName = 'link';
        $this->renderClosingTag = false;
        $this->addAttribute('rel', 'icon');
        $this->addAttribute('type', 'image/x-icon');
        $this->addAttribute('href', $this->href);*/

        return parent::getContent();
    }

}