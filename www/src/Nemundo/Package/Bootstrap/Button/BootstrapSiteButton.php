<?php

namespace Nemundo\Package\Bootstrap\Button;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;

class BootstrapSiteButton extends SiteHyperlink
{

    use BootstrapButtonTrait;

    public function getContent()
    {

        $this->loadButton();

        return parent::getContent();
    }

}