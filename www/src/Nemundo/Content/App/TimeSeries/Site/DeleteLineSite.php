<?php

namespace Nemundo\Content\App\TimeSeries\Site;

use Nemundo\Content\App\Chart\Data\ChartLine\ChartLineDelete;
use Nemundo\Content\App\TimeSeries\Data\WidgetLine\WidgetLineDelete;
use Nemundo\Content\App\TimeSeries\Parameter\ChartLineParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Site\AbstractSite;

class DeleteLineSite extends AbstractDeleteIconSite
{

    /**
     * @var DeleteLineSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Delete Line';
        $this->url = 'delete-line';

        DeleteLineSite::$site=$this;

    }

    public function loadContent()
    {

        (new WidgetLineDelete())->deleteById((new ChartLineParameter())->getValue());
        (new UrlReferer())->redirect();

    }
}