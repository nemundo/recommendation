<?php

namespace Nemundo\Package\FontAwesome\Site;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractDeleteIconSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {
        $this->title[LanguageCode::EN] = 'Delete';
        $this->title[LanguageCode::DE] = 'Löschen';
        $this->url = 'delete';
        parent::__construct($site);
        $this->icon = new DeleteIcon();

    }


    protected function loadSite()
    {

    }

}