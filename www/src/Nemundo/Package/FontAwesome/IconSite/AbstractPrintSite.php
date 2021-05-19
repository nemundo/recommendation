<?php


namespace Nemundo\Package\FontAwesome\IconSite;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractPrintSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title[LanguageCode::EN] = 'Print Version';
        $this->title[LanguageCode::DE] = 'Druckversion';
        $this->url = 'print-version';
        $this->menuActive = false;

        parent::__construct($site);
        $this->icon->icon = 'print';

    }


    protected function loadSite()
    {

    }

}