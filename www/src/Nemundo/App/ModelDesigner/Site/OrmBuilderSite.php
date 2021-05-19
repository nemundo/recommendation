<?php

namespace Nemundo\App\ModelDesigner\Site;


use Nemundo\App\ModelDesigner\Orm\OrmBuilder;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;

class OrmBuilderSite extends AbstractSite
{

    /**
     * @var OrmBuilderSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Orm';
        $this->url = 'orm';
        $this->menuActive = false;

        OrmBuilderSite::$site = $this;

    }


    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);

        $orm = new OrmBuilder();
        $orm->project = $project;
        $orm->app = $app;
        $orm->createOrm();

        (new UrlReferer())->redirect();

    }

}