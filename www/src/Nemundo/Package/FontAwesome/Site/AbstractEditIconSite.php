<?php

namespace Nemundo\Package\FontAwesome\Site;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\FontAwesome\Icon\EditIcon;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractEditIconSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title[LanguageCode::EN] = 'Edit';
        $this->title[LanguageCode::DE] = 'Bearbeiten';

        $this->url = 'edit';
        parent::__construct($site);
        $this->icon = new EditIcon();

    }


    protected function loadSite()
    {

    }

}