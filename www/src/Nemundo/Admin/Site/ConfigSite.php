<?php


namespace Nemundo\Admin\Site;


use Nemundo\App\Manifest\Site\ManifestSite;
use Nemundo\App\Robots\Site\RobotsSite;
use Nemundo\Web\Site\AbstractSite;

class ConfigSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Config';
        $this->url = 'config';

        new RobotsSite($this);
        new ManifestSite($this);

    }


    public function loadContent()
    {

    }

}