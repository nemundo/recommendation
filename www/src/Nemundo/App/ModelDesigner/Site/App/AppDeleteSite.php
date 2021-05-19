<?php

namespace Nemundo\App\ModelDesigner\Site\App;


use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class AppDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var AppDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Delete App';
        $this->url = 'app-delete';

        AppDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);

        $app->deleteApp();

        (new UrlReferer())->redirect();



    }

}