<?php

namespace Nemundo\Content\App\Contact\Site;

use Nemundo\Content\App\Contact\Page\ContactPage;
use Nemundo\Web\Site\AbstractSite;

class ContactSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Contact';
        $this->url = 'contact';
        new BusinessCardSite($this);
    }

    public function loadContent()
    {
        (new ContactPage())->render();
    }
}