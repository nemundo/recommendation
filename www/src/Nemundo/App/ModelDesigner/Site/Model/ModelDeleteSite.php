<?php

namespace Nemundo\App\ModelDesigner\Site\Model;


use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Core\Path\Path;
use Nemundo\Dev\Code\PhpNamespace;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class ModelDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var ModelDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Delete Model';
        $this->url = 'delete-model';

        ModelDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp();
        $model = (new ModelParameter())->getModel($app);

        $app->removeModel($model);

        $namespace = new PhpNamespace();
        $namespace->namespace = $model->namespace;
        $namespace->prefixNamespace = $project->namespace;
        $path = $project->path . DIRECTORY_SEPARATOR . $namespace->getPath();
        (new Path($path))->deleteDirectory();

        (new UrlReferer())->redirect();

    }

}