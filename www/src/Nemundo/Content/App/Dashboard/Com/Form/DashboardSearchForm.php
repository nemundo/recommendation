<?php


namespace Nemundo\Content\App\Dashboard\Com\Form;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\App\Dashboard\Com\ListBox\UserDashboardListBox;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class DashboardSearchForm extends SearchForm
{

    public function getContent()
    {

        $formRow=new BootstrapRow($this);

        $dashboard = new UserDashboardListBox($formRow);
        $dashboard->submitOnChange = true;
        $dashboard->searchMode = true;

        return parent::getContent();

    }

}