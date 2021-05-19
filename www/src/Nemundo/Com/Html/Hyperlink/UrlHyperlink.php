<?php

namespace Nemundo\Com\Html\Hyperlink;


use Nemundo\Html\Hyperlink\AbstractHyperlink;


class UrlHyperlink extends AbstractHyperlink
{

    use HyperlinkTrait;

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $title;


    public function getContent()
    {

        $this->checkContainerVisibility();
        $this->href = $this->url;
        $this->loadHyperlink();

        return parent::getContent();

    }

}