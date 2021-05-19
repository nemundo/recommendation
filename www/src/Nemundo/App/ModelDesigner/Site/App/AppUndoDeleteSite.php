<?php

namespace Nemundo\App\ModelDesigner\Site\App;


use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Package\FontAwesome\Site\AbstractRestoreIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class AppUndoDeleteSite extends AbstractRestoreIconSite
{

    /**
     * @var AppDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Undo Delete App';
        $this->url = 'app-undo-delete';

        AppUndoDeleteSite::$site = $this;

    }

    public function loadContent()
    {

       // $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp();

        $app->undoDeleteApp();

        (new UrlReferer())->redirect();



    }

}