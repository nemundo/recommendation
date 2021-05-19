<?php

namespace Nemundo\App\Application\Type;

use Nemundo\App\Application\Data\Application\ApplicationUpdate;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Com\Package\AbstractPackage;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Model\Collection\AbstractModelCollection;
use Nemundo\Project\AbstractProject;
use Nemundo\Web\Site\AbstractSite;


// splitting ???

abstract class AbstractApplication extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $applicationId;

    /**
     * @var string
     */
    public $application;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $applicationName;

    /**
     * @var string
     */
    public $modelCollectionClass;

    /**
     * @var string
     */
    protected $installClass;

    /**
     * @var string
     */
    protected $uninstallClass;

    /**
     * @var string
     */
    //public $cleanClass;

    // adminSite
    // usergroupCollection
    // addUsergroup


    /**
     * @var string
     */
    protected $adminSiteClass;


    /**
     * @var string
     */
    protected $publicSiteClass;


    /**
     * @var string
     */
    protected $appSiteClass;
// appSiteClass

    //protected $projectClass;

    /**
     * @var AbstractProject
     */
    public $project;


    /**
     * @var string[]
     */
    private static $installDone = [];


    abstract protected function loadApplication();

    public function __construct()
    {
        $this->loadApplication();
    }


    public function hasModelCollection()
    {

        $value = false;
        if ($this->modelCollectionClass !== null) {
            if (class_exists($this->modelCollectionClass)) {
                $value = true;
            } else {
                (new Debug())->write('Model Collection Class not found. Class: ' . $this->modelCollectionClass);
            }
        }
        return $value;

    }


    public function getModelCollection()
    {


        $modelCollection = null;

        $className = $this->modelCollectionClass;
        if (class_exists($className)) {

            /** @var AbstractModelCollection $modelCollection */
            $modelCollection = new $className();
        }

        return $modelCollection;

    }


    public function hasInstall()
    {

        $value = false;
        if ($this->installClass !== null) {
            if (class_exists($this->installClass)) {
                $value = true;
            } else {
                (new Debug())->write('Install Class not found. Class: ' . $this->installClass);
            }
        }
        return $value;

    }


    public function getInstall()
    {

        /** @var AbstractInstall $install */
        $install = new $this->installClass();

        return $install;

    }


    public function installApp()
    {

        (new ApplicationSetup())
            ->addApplication($this);

        if ($this->hasInstall()) {

            if (!isset(AbstractApplication::$installDone[$this->applicationId])) {

                $install = $this->getInstall();
                $install->install();

                $this->setAppMenuActive();

                $update = new ApplicationUpdate();
                $update->install = true;
                $update->updateById($this->applicationId);

                AbstractApplication::$installDone[$this->applicationId] = true;

            }

        } else {

            (new Debug())->write('No Install Class. Class: ' . $this->getClassName());

        }

        return $this;

    }


    public function setAppMenuActive()
    {

        $update = new ApplicationUpdate();
        $update->appMenu = true;
        $update->updateById($this->applicationId);

        return $this;

    }


    public function hasUninstall()
    {

        $value = false;
        if (class_exists($this->uninstallClass)) {
            $value = true;
        }
        return $value;

    }


    public function uninstallApp()
    {

        if ($this->hasUninstall()) {

            /** @var AbstractUninstall $install */
            $install = new $this->uninstallClass();
            $install->uninstall();

            $update = new ApplicationUpdate();
            $update->install = false;
            $update->appMenu = false;
            $update->adminMenu = false;
            $update->updateById($this->applicationId);


        } else {

            (new Debug())->write('No UnInstall Class');

        }

    }


    public function reinstallApp()
    {

        $this->uninstallApp();
        $this->installApp();

        return $this;

    }


    // hasAppSite
    public function hasAppSite()
    {

        $value = false;
        if ($this->appSiteClass !== null) {
            $value = true;
        }
        return $value;

    }


    // getAppSite
    public function getAppSite(AbstractSite $parentSite)
    {

        $site = new $this->appSiteClass($parentSite);
        return $site;

    }


    public function hasAdminSite()
    {

        $value = false;
        if ($this->adminSiteClass !== null) {
            $value = true;
        }
        return $value;

    }


    public function getAdminSite(AbstractSite $parentSite)
    {

        $site = new $this->adminSiteClass($parentSite);
        return $site;

    }




    public function hasPublicSite()
    {

        $value = false;
        if ($this->publicSiteClass !== null) {
            $value = true;
        }
        return $value;

    }


    public function getPublicSite(AbstractSite $parentSite)
    {

        $site = new $this->publicSiteClass($parentSite);
        return $site;

    }





    //protected function addPackageClass()

    /**
     * @var AbstractPackage[]
     */
    private $packageList = [];

    protected function addPackage(AbstractPackage $package)
    {

        $this->packageList[] = $package;
        return $this;

    }


    public function hasPackage()
    {

        $value = false;
        if (sizeof($this->packageList) > 0) {
            $value = true;
        }

        return $value;

    }


    public function getPackageList()
    {

        return $this->packageList;

    }


    /*
    public function getProject() {

        $project=null;

        if (class_exists($this->projectClass)) {
    $project = new $this->projectClass();

        }
        return $project; $value;


    }*/


}