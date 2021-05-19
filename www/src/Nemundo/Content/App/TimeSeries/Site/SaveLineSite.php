<?php

namespace Nemundo\Content\App\TimeSeries\Site;

use Nemundo\Content\App\TimeSeries\Data\WidgetLine\WidgetLine;
use Nemundo\Content\App\TimeSeries\Parameter\ChartLineParameter;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;

class SaveLineSite extends AbstractSite
{

    /**
     * @var SaveLineSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'SaveLine';
        $this->url = 'save-line';
        $this->menuActive=false;

        SaveLineSite::$site=$this;

    }

    public function loadContent()
    {

        $data=new WidgetLine();
        $data->lineId=(new ChartLineParameter())->getValue();
        $data->save();

        (new UrlReferer())->redirect();


    }
}