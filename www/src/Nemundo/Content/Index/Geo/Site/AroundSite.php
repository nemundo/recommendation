<?php

namespace Nemundo\Content\Index\Geo\Site;

use Nemundo\Content\Index\Geo\Page\AroundPage;
use Nemundo\Content\Index\Geo\Site\Kml\AroundKmlSite;
use Nemundo\Web\Site\AbstractSite;

class AroundSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Around';
        $this->url = 'around';

        new AroundKmlSite($this);

    }

    public function loadContent()
    {
        (new AroundPage())->render();
    }
}