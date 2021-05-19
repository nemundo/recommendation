<?php

namespace Nemundo\Content\Builder;


use Nemundo\Content\Data\ContentView\ContentViewReader;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Html\Container\AbstractContainer;

class ContentViewBuilder extends AbstractBase
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    public $viewId;


    public function getView(AbstractContainer $parent = null)
    {

        $viewRow = (new ContentViewReader())->getRowById($this->viewId);

        $class = $viewRow->viewClass;

        /** @var AbstractContentView $view */
        $view = new $class($parent);
        $view->contentType = $this->contentType;


        /*
    } else {
        $this->contentType->getDefaultView($this);
    }*/

        return $view;


    }

}