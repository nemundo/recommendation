<?php

namespace Nemundo\App\ModelDesigner\Site\Image;


use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class ImageFormatDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var ImageFormatDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Delete Image Format';
        $this->url = 'image-format-delete';

        ImageFormatDeleteSite::$site = $this;

    }


    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);
        $type = (new FieldNameParameter())->getType($model);


        //$type->addFormat();


        (new UrlReferer())->redirect();

    }


}