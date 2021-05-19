<?php

namespace Nemundo\Content\App\Dashboard\Site;

use Nemundo\App\Application\Usergroup\AppUsergroup;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardReader;
use Nemundo\Content\App\Dashboard\Page\UserDashboardPage;
use Nemundo\Content\App\Dashboard\Parameter\UserDashboardParameter;

use Nemundo\Content\App\Dashboard\Site\Admin\UserDashboardEditSite;
use Nemundo\Content\App\Dashboard\Site\Admin\UserDashboardNewSite;
use Nemundo\User\Session\UserSession;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\PlainSite;
use Nemundo\Web\Site\Site;



class UserDashboardSite extends AbstractSite
{

    /**
     * @var UserDashboardSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'MyDashboard';
        $this->url = 'my-dashboard';
        $this->restricted=true;
        $this->addRestrictedUsergroup(new AppUsergroup());

        UserDashboardSite::$site=$this;


        new UserDashboardEditSite($this);

        $reader = new UserDashboardReader();
        $reader->filter->andEqual($reader->model->userId, (new UserSession())->userId);
        $reader->addOrder($reader->model->dashboard);
        foreach ($reader->getData() as $dashboardRow) {

            $site=clone(UserDashboardSite::$site);
            $site->title = $dashboardRow->dashboard;
            $site->addParameter((new UserDashboardParameter($dashboardRow->id)));
            $this->addSite($site);

        }

        new UserDashboardNewSite($this);

    }


    public function loadContent()
    {


        /*
        $parameter=new UserDashboardParameter();
        if ($parameter->notExists()) {

            $reader = new UserDashboardReader();
            $reader->filter->andEqual($reader->model->userId, (new UserSession())->userId);
            $reader->addOrder($reader->model->dashboard);
            $reader->limit = 1;
            foreach ($reader->getData() as $dashboardRow) {
                $parameter->setValue($dashboardRow->id);
            }

            $site=clone(UserDashboardSite::$site);
            $site->addParameter($parameter);
            $site->redirect();

        }*/

        (new UserDashboardPage())->render();

    }

}