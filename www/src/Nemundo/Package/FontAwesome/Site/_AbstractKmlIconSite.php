<?php

namespace Nemundo\Package\FontAwesome\Site;


use Nemundo\Package\FontAwesome\FontAwesomeIcon;
use Nemundo\Web\Site\AbstractSiteTree;

// nach kml
abstract class AbstractKmlIconSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title = 'Kml (Google Earth)';
        $this->url = 'kml';
        parent::__construct($site);

        /*$this->icon = new FontAwesomeIcon();
        $this->icon->icon = 'globe';*/

        if ($this->icon->icon == null) {
            $this->icon->icon = 'globe';
        }


    }


    protected function loadSite()
    {

    }

}