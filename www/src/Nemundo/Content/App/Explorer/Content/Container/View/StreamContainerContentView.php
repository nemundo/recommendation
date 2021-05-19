<?php

namespace Nemundo\Content\App\Explorer\Content\Container\View;

use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Block\Hr;
use Nemundo\Html\Paragraph\Paragraph;

class StreamContainerContentView extends AbstractContainerContentView
{

    protected function loadView()
    {

        $this->viewName='Stream';
        $this->viewId='fc4d6ae6-e025-4090-a6b1-a9e959089958';
        $this->defaultView=false;

    }

    public function getContent()
    {

        $p = new Paragraph($this);
        $p->content = (new Html($this->contentType->getDataRow()->description))->getValue();


        $reader = new ChildContentReader();
        $reader->contentType = $this->contentType;


        foreach ($reader->getData() as $contentRow) {

            $contentType = $contentRow->child->getContentType();
            $view = $contentType->getDefaultView($this);
            $view->redirectSite = $this->redirectSite;

            (new Hr($this));

        }

        return parent::getContent();
    }
}