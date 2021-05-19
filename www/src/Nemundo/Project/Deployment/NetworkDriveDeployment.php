<?php

namespace Nemundo\Project\Deployment;


class NetworkDriveDeployment extends AbstractDeployment
{

    public $deploymentPath;

    protected function loadDeployment()
    {
        // TODO: Implement loadDeployment() method.

        $this->createConfigFile = false;
        $this->deleteBeforeDeploy=false;
        $this->webPath = 'html';

    }

}