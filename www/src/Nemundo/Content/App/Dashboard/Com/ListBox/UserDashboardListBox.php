<?php


namespace Nemundo\Content\App\Dashboard\Com\ListBox;


use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardReader;
use Nemundo\Content\App\Dashboard\Parameter\UserDashboardParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\User\Session\UserSession;

class UserDashboardListBox extends BootstrapListBox
{

    protected function loadContainer()
    {
        parent::loadContainer();

        $this->name=(new UserDashboardParameter())->getParameterName();
        $this->label = 'Dashboard';

    }

    public function getContent()
    {

        $reader = new UserDashboardReader();
        $reader->filter->andEqual($reader->model->userId, (new UserSession())->userId);
        $reader->addOrder($reader->model->dashboard);
        foreach ($reader->getData() as $dashboardRow) {
            $this->addItem($dashboardRow->id, $dashboardRow->dashboard);
        }

        return parent::getContent();

    }

}