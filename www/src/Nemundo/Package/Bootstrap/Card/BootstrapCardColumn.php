<?php

namespace Nemundo\Package\Bootstrap\Card;


use Nemundo\Html\Block\Div;

class BootstrapCardColumn extends Div
{


    public function getContent()
    {

        $this->addCssClass('card-columns');

        return parent::getContent();
    }

}