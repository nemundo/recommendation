<?php

namespace Nemundo\Package\FontAwesome\Site;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;
use Nemundo\Web\Site\AbstractSiteTree;


abstract class AbstractRestoreIconSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title[LanguageCode::DE] = 'Wiederherstellen';
        $this->title[LanguageCode::EN] = 'Restore';
        $this->url = 'restore';
        parent::__construct($site);
        $this->icon = new FontAwesomeIcon();
        $this->icon->icon = 'trash-restore';

    }


    protected function loadSite()
    {

    }

}