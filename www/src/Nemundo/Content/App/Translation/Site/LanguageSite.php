<?php

namespace Nemundo\Content\App\Translation\Site;


use Nemundo\Content\App\Translation\Page\LanguagePage;
use Nemundo\Web\Site\AbstractSite;

class LanguageSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Language';
        $this->url = 'language';


    }

    public function loadContent()
    {
        (new LanguagePage())->render();

    }
}