<?php

namespace Nemundo\Content\App\TimeSeries\Site;

use Nemundo\Content\App\Chart\Data\ChartLine\ChartLineDelete;
use Nemundo\Content\App\TimeSeries\Data\WidgetLine\WidgetLineDelete;
use Nemundo\Content\App\TimeSeries\Parameter\ChartLineParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Site\AbstractSite;

class ClearLineSite extends AbstractDeleteIconSite
{

    /**
     * @var ClearLineSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Clear Line';
        $this->url = 'clear-line';

        ClearLineSite::$site=$this;

    }

    public function loadContent()
    {

        (new WidgetLineDelete())->delete();
        (new UrlReferer())->redirect();

    }
}