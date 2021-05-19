<?php

namespace Nemundo\App\ModelDesigner\Site\Index;


use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\IndexParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class IndexTypeDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var IndexTypeDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Delete Index Type';
        $this->url = 'index-type-delete';

        IndexTypeDeleteSite::$site = $this;

    }


    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);
        $index = (new IndexParameter())->getIndex($model);

        foreach ($index->getTypeList() as $type) {
            if ($type->fieldName == (new FieldNameParameter())->getValue()) {
                $index->removeType($type);
            }
        }

        $app->writeJson();

        (new UrlReferer())->redirect();

    }

}