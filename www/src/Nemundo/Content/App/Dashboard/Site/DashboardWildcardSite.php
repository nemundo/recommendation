<?php

namespace Nemundo\Content\App\Dashboard\Site;

use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardCount;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardId;
use Nemundo\Content\App\Dashboard\Page\DashboardWildcardPage;
use Nemundo\Web\Site\AbstractWildcardSite;


class DashboardWildcardSite extends AbstractWildcardSite
{

    public function checkWildcardUrl()
    {

        $value = false;

        if (true) {

            $count = new DashboardCount();
            $count->filter->andEqual($count->model->url, $this->wildcardUrl);
            if ($count->getCount() == 1) {
                $value = true;
            }

        }

        return $value;

    }


    public function loadContent()
    {

        $id = new DashboardId();
        $id->filter->andEqual($id->model->url, $this->wildcardUrl);
        $dashboardId = $id->getId();

        $page = new DashboardWildcardPage();
        $page->dashboardId = $dashboardId;
        $page->render();

    }

}