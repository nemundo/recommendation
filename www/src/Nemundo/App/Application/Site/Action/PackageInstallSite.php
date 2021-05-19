<?php


namespace Nemundo\App\Application\Site\Action;


use Nemundo\Admin\WebProject\AdminWebProject;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;

class PackageInstallSite extends AbstractSite
{

    /**
     * @var PackageInstallSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Package Install';
        $this->url = 'package-install';
        $this->menuActive = false;

        PackageInstallSite::$site = $this;

    }


    public function loadContent()
    {

        $application = (new ApplicationParameter())->getApplication();

        foreach ($application->getPackageList() as $package) {

            $setup = new PackageSetup();
            $setup->destinationPath =  (new AdminWebProject())->getWebPath();  //webPath;
            $setup->addPackage($package);

            //$package->in

        }

        (new UrlReferer())->redirect();

    }

}