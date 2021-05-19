<?php

namespace Nemundo\Content\Index\Tree\Site\Admin;

use Nemundo\Content\Index\Tree\Page\Admin\ConfigPage;
use Nemundo\Content\Index\Tree\Page\TreePage;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Web\Site\AbstractSite;

class ConfigSite extends AbstractSite
{

    /**
     * @var ConfigSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Config';
        $this->url = 'tree-config';

        ConfigSite::$site=$this;

        //new TreeNewSite($this);
        //TreeSite::$site = $this;

    }

    public function loadContent()
    {

        (new ConfigPage())->render();


    }
}