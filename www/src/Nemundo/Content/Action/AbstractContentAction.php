<?php

namespace Nemundo\Content\Action;


use Nemundo\Content\Type\AbstractType;


abstract class AbstractContentAction extends AbstractType
{

    public $actionLabel;

    public $actionContentId;

    public function onAction()
    {

    }


    public function isMenuVisible()
    {

        return true;

    }


}