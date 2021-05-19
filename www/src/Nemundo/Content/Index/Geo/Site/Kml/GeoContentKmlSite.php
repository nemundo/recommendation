<?php

namespace Nemundo\Content\Index\Geo\Site\Kml;

use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Content\Index\Geo\Parameter\GeoIndexParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Geo\Kml\Document\KmlDocument;
use Nemundo\Geo\Kml\Object\KmlMarker;
use Nemundo\Geo\Kml\Site\AbstractKmlSite;
use Nemundo\Package\FontAwesome\Site\AbstractKmlIconSite;

class GeoContentKmlSite extends AbstractKmlSite
{

    /**
     * @var GeoContentKmlSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Kml Content';
        $this->url = 'kml-content';

        GeoContentKmlSite::$site = $this;

    }


    public function loadContent()
    {

        $kml = new KmlDocument();
        $kml->filename = 'geoindex.kml';

        $reader = new GeoIndexReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        $reader->filter->andEqual($reader->model->id, (new GeoIndexParameter())->getValue());

        foreach ($reader->getData() as $geoIndexRow) {

            $contentType = $geoIndexRow->content->getContentType();
            $contentType->getKmlMarker($kml);

        }

        $kml->render();


    }

}