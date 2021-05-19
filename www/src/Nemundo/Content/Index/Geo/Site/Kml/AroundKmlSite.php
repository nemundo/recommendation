<?php

namespace Nemundo\Content\Index\Geo\Site\Kml;

use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Content\Index\Geo\Parameter\GeoIndexParameter;
use Nemundo\Content\Index\Geo\Parameter\LatitudeParameter;
use Nemundo\Content\Index\Geo\Parameter\LongitudeParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Geo\Kml\Document\KmlDocument;
use Nemundo\Geo\Kml\Object\KmlMarker;
use Nemundo\Geo\Kml\Site\AbstractKmlSite;
use Nemundo\Geo\Kml\Style\Style;
use Nemundo\Model\Filter\GeoCoordinateSquareFilter;
use Nemundo\Package\FontAwesome\Site\AbstractKmlIconSite;
use Nemundo\Roundshot\Kml\RoundshotStyle;
use Nemundo\Sbb\Bahnhof\Kml\BahnhofKmlStyle;
use Nemundo\Swisstopo\SwissNames\Kml\SwissNamesKmlStyle;

class AroundKmlSite extends AbstractKmlSite
{

    /**
     * @var AroundKmlSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Around Kml';
        $this->url = 'kml-around';

        AroundKmlSite::$site = $this;

    }


    public function loadContent()
    {

        $kml = new KmlDocument();
        $kml->filename = 'geoindex.kml';


        new RoundshotStyle($kml);
        new SwissNamesKmlStyle($kml);
        new BahnhofKmlStyle($kml);


        $geoReader = new GeoIndexReader();
        $geoReader->model->loadContent();
        $geoReader->model->content->loadContentType();


        $filter = new GeoCoordinateSquareFilter();
        $filter->coordinateCenter->latitude=(new LatitudeParameter())->getValue();
        $filter->coordinateCenter->longitude=(new LongitudeParameter())->getValue();
        $filter->coordinateType = $geoReader->model->coordinate;
        $filter->distanceInKilometres=20;

        $geoReader->filter->andFilter($filter);

        //$reader->filter->andEqual($reader->model->id, (new GeoIndexParameter())->getValue());

        //$geoReader->limit=50;


        foreach ($geoReader->getData() as $geoIndexRow) {

            $contentType = $geoIndexRow->content->getContentType();
            $contentType->getKmlMarker($kml);

        }

        $kml->render();


    }

}