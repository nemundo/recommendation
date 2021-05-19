<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Web\Site\AbstractSite;

class AbstractIndexContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;

}