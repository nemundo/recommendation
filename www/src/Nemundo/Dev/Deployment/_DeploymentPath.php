<?php


namespace Nemundo\Dev\Deployment;


use Nemundo\Core\Path\AbstractPath;

class DeploymentPath extends AbstractPath
{

    protected function loadPath()
    {
        // TODO: Implement loadPath() method.

        $this->addPath('D:\Tmp\deploy');

    }

}