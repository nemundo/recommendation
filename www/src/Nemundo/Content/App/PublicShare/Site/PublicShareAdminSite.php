<?php

namespace Nemundo\Content\App\PublicShare\Site;

use Nemundo\Content\App\PublicShare\Page\PublicShareAdminPage;
use Nemundo\Web\Site\AbstractSite;

class PublicShareAdminSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Public Share Admin';
        $this->url = 'public-share-admin';

        new PublicShareDeleteSite($this);

    }

    public function loadContent()
    {
        (new PublicShareAdminPage())->render();
    }
}