<?php


namespace Nemundo\Project\Web;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Path\Path;
use Nemundo\Project\Path\ProjectPath;

class WebSetup extends AbstractBase
{

    public function addWeb(AbstractWebProject $webProject)
    {

        $path = (new ProjectPath())
            ->addPath($webProject->webPath)
            ->getPath();

        (new Path($path))->createPath();

        //(new Path($webProject->))


    }

}