<?php

namespace Nemundo\App\MySql\Site;

use Nemundo\App\MySql\Page\SlowQueryPage;
use Nemundo\Web\Site\AbstractSite;

class SlowQuerySite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Slow Query';
        $this->url = 'slow-query';
    }

    public function loadContent()
    {
        (new SlowQueryPage())->render();
    }
}