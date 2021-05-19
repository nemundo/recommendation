<?php


namespace Nemundo\Content\App\Dashboard\Action;


use Nemundo\Content\App\Dashboard\Com\ListBox\DashboardListBox;
use Nemundo\Content\Form\AbstractContentForm;

class DashboardActionContentForm extends AbstractContentForm
{

    /**
     * @var DashboardContentAction
     */
    public $contentType;

    /**
     * @var DashboardListBox
     */
    private $dashboard;

    public function getContent()
    {

        $this->dashboard = new DashboardListBox($this);
        $this->dashboard->validation = true;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $this->contentType->dashboardId=$this->dashboard->getValue();
        $this->contentType->onAction();


    }

}