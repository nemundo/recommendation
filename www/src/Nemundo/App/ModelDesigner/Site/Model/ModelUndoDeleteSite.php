<?php

namespace Nemundo\App\ModelDesigner\Site\Model;


use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Package\FontAwesome\Site\AbstractRestoreIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class ModelUndoDeleteSite extends AbstractRestoreIconSite
{

    /**
     * @var ModelUndoDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Undo Delete Model Delete';
        $this->url = 'model-delete-undo';

        ModelUndoDeleteSite::$site = $this;

    }


    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $appJson = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($appJson,false);

        $model->isDeleted = false;
        $appJson->writeJson();

        (new UrlReferer())->redirect();

    }

}