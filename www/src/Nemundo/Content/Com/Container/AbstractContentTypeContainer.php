<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Type\JsonContentTrait;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractContentTypeContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractTreeContentType|JsonContentTrait
     */
    public $contentType;


    /**
     * @var AbstractSite
     */
    public $redirectSite;


}