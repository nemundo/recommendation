<?php

namespace Nemundo\Content\App\Dashboard\Site;

use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;
use Nemundo\Content\App\Dashboard\Site\Edit\ContentNewSite;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\Template\DefaultContentTemplate;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\PlainSite;


class DashboardSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Dashboard';
        $this->url = 'dashboard';

        $reader = new DashboardReader();
        $reader->filter->andEqual($reader->model->active,true);
        $reader->addOrder($reader->model->dashboard);
        foreach ($reader->getData() as $dashboardRow) {

            $site = new PlainSite($this);
            $site->title = $dashboardRow->dashboard;
            $site->url = $dashboardRow->url;

        }

        new DashboardWildcardSite($this);
        new DashboardEditSite($this);

    }


    public function loadContent()
    {

        $page= (new DefaultTemplateFactory())->getDefaultTemplate();

        $p=new Paragraph($page);
        $p->content = 'Kein Dashboard vorhanden.';

        $page->render();

    }

}