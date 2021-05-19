<?php

namespace Nemundo\Package\Bootstrap\Button;



use Nemundo\Com\Html\Hyperlink\UrlHyperlink;

class BootstrapUrlButton extends UrlHyperlink
{

    use BootstrapButtonTrait;

    public function getContent()
    {

        $this->loadButton();

        return parent::getContent();
    }

}