<?php

namespace Nemundo\App\ModelDesigner\Site\Data;

use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Db\Delete\DataDelete;
use Nemundo\Model\Delete\ModelDelete;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;

class DataEmptySite extends AbstractSite
{

    /**
     * @var DataEmptySite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Empty Data';
        $this->url = 'empty-data';
        $this->menuActive = false;

        DataEmptySite::$site=$this;

    }


    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);

        $delete = new ModelDelete();
        $delete->model = $model;
        $delete->delete();

        (new UrlReferer())->redirect();

    }

}