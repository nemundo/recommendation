<?php

namespace Nemundo\App\ModelDesigner\Site\Data;


use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Model\Delete\ModelDelete;
use Nemundo\Model\Setup\ModelSetup;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;

class DropDataSite extends AbstractSite
{

    /**
     * @var DataEmptySite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Drop Data';
        $this->url = 'drop-data';
        $this->menuActive = false;

        DropDataSite::$site = $this;

    }


    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);

        $delete = new ModelSetup();
        $delete->model = $model;
        $delete->dropTable();

        (new UrlReferer())->redirect();

    }

}