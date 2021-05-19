<?php

namespace Nemundo\App\System\Site;

use Nemundo\App\System\Page\SystemPage;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\System\Com\SystemInformationTable;

class SystemSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'System';
        $this->url = 'system';
    }


    public function loadContent()
    {

        (new SystemPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        new SystemInformationTable($page);
        $page->render();
*/
    }

}