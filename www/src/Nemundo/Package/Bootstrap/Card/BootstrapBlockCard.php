<?php

namespace Nemundo\Package\Bootstrap\Card;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Heading\H4;
use Nemundo\Html\Paragraph\Paragraph;


class BootstrapBlockCard extends Div
{

    public $title;

    public $text;

    public $linkText;

    public $linkUrl;


    public function getContent()
    {

        $this->addCssClass('card');
        $this->addCssClass('card-block');
        $this->addCssClass('mb-3');

        $h4 = new H4($this);
        $h4->addCssClass('card-title');
        $h4->content = $this->title;

        $p = new Paragraph($this);
        $p->addCssClass('card-text');
        $p->content = $this->text;

        $link = new UrlHyperlink($this);
        $link->content = $this->linkText;
        $link->url = $this->linkUrl;
        $link->openNewWindow = true;

        return parent::getContent();
    }

}