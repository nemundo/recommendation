<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Usergroup\AdminUsergroup;
use Nemundo\Web\Site\AbstractSite;


class AdminSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Admin';
        $this->url = 'admin';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new AdminUsergroup());

        $reader = new ApplicationReader();
        $reader->filter->andEqual($reader->model->install, true);
        //$reader->filter->andEqual($reader->model->adminMenu, true);

        $reader->addOrder($reader->model->application);
        foreach ($reader->getData() as $applicationRow) {

            $app = $applicationRow->getApplication();
            if ($app !== null) {
                if ($app->hasAdminSite()) {
                    $app->getAdminSite($this);
                }
            }

        }

    }


    public function loadContent()
    {

    }

}