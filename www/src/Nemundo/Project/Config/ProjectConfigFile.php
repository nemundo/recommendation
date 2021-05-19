<?php


namespace Nemundo\Project\Config;


use Nemundo\Core\Config\ConfigFile;
use Nemundo\Project\Filename\ProjectConfigFilename;

class ProjectConfigFile extends ConfigFile
{

    public function __construct()
    {

        $filename = (new ProjectConfigFilename())->getFullFilename();
        parent::__construct($filename);

    }


}