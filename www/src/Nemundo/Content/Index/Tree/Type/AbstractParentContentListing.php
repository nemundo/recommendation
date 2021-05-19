<?php


namespace Nemundo\Content\Index\Tree\Type;


use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Html\Container\AbstractHtmlContainer;


class AbstractParentContentListing extends AbstractContentListing
{

    /**
     * @var string
     */
    public $parentId;

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;


}