<?php

namespace Nemundo\App\Linux\Site;

use Nemundo\App\Linux\Page\CmdPage;
use Nemundo\Web\Site\AbstractSite;

class CmdSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Cmd';
        $this->url = 'cmd';
    }

    public function loadContent()
    {
        (new CmdPage())->render();
    }
}