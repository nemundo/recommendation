<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Page\ApplicationPage;
use Nemundo\App\Application\Site\Action\PackageInstallSite;
use Nemundo\Web\Site\AbstractSite;

class ApplicationSite extends AbstractSite
{

    /**
     * @var ApplicationSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Application';
        $this->url = 'application';
        ApplicationSite::$site = $this;

        new ApplicationEditSite($this);

        new InstallSite($this);
        new PackageInstallSite($this);


        new UninstallSite($this);
        new ReinstallSite($this);

        new DataSite($this);
        new ProjectSite($this);

        new SystemLogSite($this);

        new ClearSite($this);

    }


    public function loadContent()
    {

        (new ApplicationPage())->render();

    }

}