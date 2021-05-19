<?php

namespace Nemundo\Content\App\Location\Content\Location;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Content\App\Location\Parameter\LocationParameter;
use Nemundo\Content\App\Location\Site\LocationKmlSite;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Geo\Map\GoogleMaps\GoogleMapsHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Heading\H2;
use Nemundo\Html\Paragraph\Paragraph;

class LocationContentView extends AbstractContentView
{
    /**
     * @var LocationContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='9922f65f-70c1-43b2-bef7-f44ed3f65139';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $locationRow=$this->contentType->getDataRow();

        $h2=new H2($this);
        $h2->content=$locationRow->location;

        $p=new Paragraph($this);
        $p->content=$locationRow->description;

        $div=new Div($this);

        $hyperlink=new GoogleMapsHyperlink($div);
        $hyperlink->geoCoordinate = $locationRow->geoCoordinate;

        $site=clone(LocationKmlSite::$site);
        $site->addParameter(new LocationParameter($locationRow->id));

        $btn=new AdminIconSiteButton($this);
        $btn->site=$site;


        return parent::getContent();
    }
}