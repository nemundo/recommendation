<?php

namespace Nemundo\Com\Container;


use Nemundo\Html\Container\AbstractHtmlContainer;

class AbstractRestrictedUserHtmlContainer extends AbstractHtmlContainer
{

    use ContainerUserRestrictionTrait;


    public function getContent()
    {

        $this->checkContainerVisibility();

        return parent::getContent();
    }

}