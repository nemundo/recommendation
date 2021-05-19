<?php


namespace Nemundo\Srf\Template;


use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Document\AbstractDocument;
use Nemundo\Package\Bootstrap\Tabs\BootstrapSiteTabs;
use Nemundo\Srf\Site\SrfSite;

class SrfTemplate extends AbstractTemplateDocument  // AbstractDocument  //Container  // SchleunigerTemplate  // AdminTemplate
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new BootstrapSiteTabs($this);  // new AdminNavigation($this);
        $nav->site = SrfSite::$site;

    }



}