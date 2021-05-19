<?php


namespace Nemundo\Package\FontAwesome\IconSite;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\FontAwesome\Icon\EditIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractCalendarIconSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title = 'Outlook Kalender';
        $this->url = 'outlook-kalender';

        parent::__construct($site);
        $this->icon->icon = 'calendar-alt';

    }


    protected function loadSite()
    {

    }

}