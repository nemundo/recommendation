<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;

class InstallSite extends AbstractSite
{

    /**
     * @var InstallSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Install';
        $this->url = 'install';
        $this->menuActive = false;

        InstallSite::$site = $this;

    }


    public function loadContent()
    {

        $application = (new ApplicationParameter())->getApplication();
        $application->installApp()->setAppMenuActive();

        foreach ($application->getPackageList() as $package) {
            $packageList[$package->packageName] = $package;
        }

        (new UrlReferer())->redirect();

    }

}