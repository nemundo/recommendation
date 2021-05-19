<?php


namespace Nemundo\Content\View;


use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractContentView extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType
     */
    public $contentType;


    public $viewId;

    public $viewName = 'default';

    /**
     * @var bool
     */
    public $defaultView=false;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    abstract protected function loadView();


    public function __construct(AbstractContainer $parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->loadView();
    }


}