<?php

namespace Nemundo\Com\Html\Block;


use Nemundo\Com\Container\ContainerUserRestrictionTrait;
use Nemundo\Html\Block\Div;

class RestrictedDiv extends Div
{

    use ContainerUserRestrictionTrait;

    public function getContent()
    {

        $this->checkContainerVisibility();
        return parent::getContent();

    }

}