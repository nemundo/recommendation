<?php


namespace Nemundo\Content\Com\Base;


use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Web\Site\AbstractSite;

trait ContentTypeRedirectTrait
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

}