<?php

namespace Nemundo\Package\FontAwesome\Site;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Icon\SaveIcon;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractSaveIconSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {
        $this->title[LanguageCode::EN] = 'Save';
        $this->title[LanguageCode::DE] = 'Speichern';
        $this->url = 'save';
        parent::__construct($site);
        $this->icon = new SaveIcon();

    }


    protected function loadSite()
    {

    }

}