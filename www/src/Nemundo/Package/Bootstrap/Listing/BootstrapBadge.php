<?php

namespace Nemundo\Package\Bootstrap\Listing;


use Nemundo\Html\Inline\Span;

class BootstrapBadge extends Span
{

    public function getContent()
    {

        $this->addCssClass('badge bg-primary rounded-pill');
        return parent::getContent();

    }

}