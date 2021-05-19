<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Page\AppPage;
use Nemundo\App\Application\Usergroup\AppUsergroup;
use Nemundo\Web\Site\AbstractSite;


class PublicSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Public';
        $this->url = 'public';
        $this->menuActive=false;

        $reader = new ApplicationReader();
        $reader->filter->andEqual($reader->model->install, true);
        //$reader->filter->andEqual($reader->model->appMenu, true);

        $reader->addOrder($reader->model->application);
        foreach ($reader->getData() as $applicationRow) {

            $app = $applicationRow->getApplication();
            if ($app!==null) {
                if ($app->hasPublicSite()) {
                    $app->getPublicSite($this);
                }
            }

        }

    }


    public function loadContent()
    {

    }

}