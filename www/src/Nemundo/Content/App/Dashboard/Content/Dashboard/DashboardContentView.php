<?php

namespace Nemundo\Content\App\Dashboard\Content\Dashboard;

use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class DashboardContentView extends AbstractContentView
{

    /**
     * @var DashboardContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName = 'default';
        $this->viewId = '9331f28b-f838-4736-9281-8c4533773d8a';
        $this->defaultView = true;

    }

    public function getContent()
    {

        $row = new BootstrapRow($this);

        $child = new ChildContentReader();
        $child->contentType = $this->contentType;
        foreach ($child->getData() as $treeRow) {

            $contentType = $treeRow->child->getContentType();
            if ($contentType->hasView()) {
                $contentType->getView($treeRow->viewId, $row);
            }

        }

        return parent::getContent();

    }

}