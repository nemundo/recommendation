<?php


namespace Nemundo\Project\Deployment;


use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Path\Path;
use Nemundo\Project\Path\TmpPath;

class ZipDeployment extends AbstractDeployment
{

    public $zipFilename;


    protected function loadDeployment()
    {

        $this->deploymentPath = (new TmpPath())->addPath('zip_deployment')->getPath();

    }


    public function deploy()
    {

        parent::deploy();

        $archive = new ZipArchive();
        $archive->archiveFilename = $this->zipFilename;
        $archive->addPath($this->deploymentPath);
        $archive->createArchive();

        (new Path($this->deploymentPath))->deleteDirectory();

    }

}