<?php

namespace Nemundo\Package\Bootstrap\Card;


use Nemundo\Html\Heading\H5;


class BootstrapCardTitle extends H5
{

    public function getContent()
    {

        $this->addCssClass('card-title');
        return parent::getContent();
    }

}