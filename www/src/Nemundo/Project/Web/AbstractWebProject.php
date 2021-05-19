<?php

namespace Nemundo\Project\Web;


// AbstractWebHost
// AbstractWebPath
// AbstractWebDomain
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Project\Path\ProjectPath;

abstract class AbstractWebProject extends AbstractBase
{

    public $webPath;

    public $webUrl = '/';

    // loadProject
    abstract protected function loadWeb();

    public function __construct() {
        $this->loadWeb();
    }


    public function getWebPath() {

        $path = (new ProjectPath())->addPath($this->webPath)->getPath();
        return $path;

    }



}