<?php

namespace Nemundo\Content\App\Explorer\Content\Container\View;


use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\View\AbstractContentView;

abstract class AbstractContainerContentView extends AbstractContentView
{

    /**
     * @var ContainerContentType
     */
    public $contentType;

}