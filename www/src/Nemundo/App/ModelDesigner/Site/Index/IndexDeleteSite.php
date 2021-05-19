<?php

namespace Nemundo\App\ModelDesigner\Site\Index;


use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\IndexParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;

class IndexDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var IndexDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
   $this->title = 'Delete Index';
   $this->url = 'index-delete';

   IndexDeleteSite::$site=$this;

    }


    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);
        $index = (new IndexParameter())->getIndex($model);

        $model->removeIndex($index);
        $app->writeJson();

        (new UrlReferer())->redirect();

    }

}