<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;


class UninstallSite extends AbstractSite
{

    /**
     * @var UninstallSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'UnInstall';
        $this->url = 'uninstall';
        $this->menuActive=false;

        UninstallSite::$site = $this;

    }


    public function loadContent()
    {

        $app = (new ApplicationParameter())->getApplication();
        $app->uninstallApp();

        (new UrlReferer())->redirect();

    }

}