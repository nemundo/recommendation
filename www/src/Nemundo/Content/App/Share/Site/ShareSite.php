<?php

namespace Nemundo\Content\App\Share\Site;

use Nemundo\Content\App\Share\Page\SharePage;
use Nemundo\Web\Site\AbstractSite;

class ShareSite extends AbstractSite
{
    protected function loadSite()
    {

        $this->title = 'Share';
        $this->url = 'share';

        // move to controller???
        new PrivateShareContentSite($this);
        new PrivateShareDeleteSite($this);

    }

    public function loadContent()
    {
        (new SharePage())->render();
    }
}