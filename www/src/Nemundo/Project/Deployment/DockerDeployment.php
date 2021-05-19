<?php

namespace Nemundo\Project\Deployment;


use Nemundo\Com\Package\PackageCopy;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Core\Path\Path;
use Nemundo\Project\Deployment\Package\DockerPackage;

class DockerDeployment extends AbstractDeployment
{

    public $dockerPath;

    protected function loadDeployment()
    {

    }


    public function deploy()
    {

        $this->deleteBeforeDeploy = false;
        $this->webPath = 'html';

        $this->deploymentPath = (new Path($this->dockerPath))->addPath('www')->getPath();

        $this->createConfigFile = true;

        $this->configFileBuilder->filename = $this->getDeploymentPath()
            ->addPath('config.ini')
            ->getFullFilename();

        $this->configFileBuilder->mySqlHost = 'db';
        $this->configFileBuilder->mySqlUser = 'php_project';
        $this->configFileBuilder->mySqlPassword = '123456';
        $this->configFileBuilder->mySqlDatabase = 'php_project';

        parent::deploy();

    }


    protected function onDeploy()
    {

        /*$setup = new PackageSetup();
        $setup->destinationPath = $this->dockerPath;
        $setup->addPackage(new DockerPackage());*/

        (new PackageCopy())->copyPackage(new DockerPackage(),$this->dockerPath);


    }

}