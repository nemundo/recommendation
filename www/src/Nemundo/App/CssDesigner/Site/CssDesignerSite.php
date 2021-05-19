<?php

namespace Nemundo\App\CssDesigner\Site;

use Nemundo\App\CssDesigner\Page\CssDesignerPage;
use Nemundo\Web\Site\AbstractSite;

class CssDesignerSite extends AbstractSite
{

    /**
     * @var CssDesignerSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Css Designer';
        $this->url = 'css-designer';
        CssDesignerSite::$site=$this;
    }

    public function loadContent()
    {
        (new CssDesignerPage())->render();
    }
}