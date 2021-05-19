<?php


namespace Nemundo\Content\App\Dashboard\Com\ListBox;


use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;

class DashboardListBox extends BootstrapListBox
{

    public function getContent()
    {

        $this->label = 'Dashboard';

        $reader = new DashboardReader();
        //$reader->model->loadContent();
        //$reader->addOrder($reader->model->content->subject);
        $reader->addOrder($reader->model->dashboard);
        foreach ($reader->getData() as $dashboardRow) {
            //$this->addItem($dashboardRow->contentId, $dashboardRow->content->subject);
            $this->addItem($dashboardRow->id, $dashboardRow->dashboard);
        }

        return parent::getContent();

    }


    public function getDashboardContentType() {

        $type=new DashboardContentType($this->getValue());
        return $type;


    }


}