<?php

namespace Nemundo\Content\App\IssueTracker\Content\IssueContainer;

use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\Type\AbstractContentType;

class IssueContainerContentType extends ContainerContentType  // AbstractContentType
{
    protected function loadContentType()
    {

        parent::loadContentType();

        $this->typeLabel = 'IssueContainer';
        $this->typeId = '9fffb6ee-6d7f-4a79-afa6-f1cb74e844d2';
    }

}