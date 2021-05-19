<?php

namespace Nemundo\App\Application\Site;

use Nemundo\App\Application\Page\ApplicationEditPage;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class ApplicationEditSite extends AbstractEditIconSite
{

    /**
     * @var ApplicationEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'ApplicationEdit';
        $this->url = 'application-edit';
        ApplicationEditSite::$site=$this;
    }

    public function loadContent()
    {
        (new ApplicationEditPage())->render();
    }
}