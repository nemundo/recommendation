<?php

namespace Nemundo\Content\Index\Geo\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexPaginationReader;
use Nemundo\Content\Index\Geo\Parameter\GeoIndexParameter;
use Nemundo\Content\Index\Geo\Parameter\LatitudeParameter;
use Nemundo\Content\Index\Geo\Parameter\LongitudeParameter;
use Nemundo\Content\Index\Geo\Site\Kml\AroundKmlSite;
use Nemundo\Content\Index\Geo\Site\Kml\GeoContentKmlSite;
use Nemundo\Content\Index\Geo\Template\GeoIndexTemplate;
use Nemundo\Core\Geo\Distance\GeoCoordinateDistance;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Model\Filter\GeoCoordinateSquareFilter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapGeoCoordinate;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class AroundPage extends GeoIndexTemplate
{
    public function getContent()
    {


        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $geo = new BootstrapGeoCoordinate($formRow);


        $geoCoordinate = new GeoCoordinate();
        $geoCoordinate->fromText('46.8735590368648, 8.635687309394777');
        //$geoCoordinate->fromText('46.90687596057738, 8.396299802775115');


        $btn = new AdminIconSiteButton($this);
        $btn->site = clone(AroundKmlSite::$site);
        $btn->site->addParameter(new LatitudeParameter($geoCoordinate->latitude));
        $btn->site->addParameter(new LongitudeParameter($geoCoordinate->longitude));


        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Content Type');
        $header->addText('Place');
        $header->addText('Coordinate');
        $header->addText('Distance');

        $geoReader = new GeoIndexPaginationReader();
        $geoReader->model->loadContent();
        $geoReader->model->content->loadContentType();


        $filter = new GeoCoordinateSquareFilter();
        $filter->coordinateCenter = $geoCoordinate;
        $filter->coordinateType = $geoReader->model->coordinate;
        $filter->distanceInKilometres = 10;

        $geoReader->filter->andFilter($filter);


        /*
        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        if ($contentTypeParameter->hasValue()) {
            $geoReader->filter->andEqual($geoReader->model->content->contentTypeId, $contentTypeParameter->getValue());
        }

        $geoReader->addOrder($geoReader->model->place);*/

        foreach ($geoReader->getData() as $geoRow) {

            $contentType = $geoRow->content->getContentType();

            if ($contentType !== null) {
                $row = new AdminClickableTableRow($table);

                if ($geoRow->id == (new GeoIndexParameter())->getValue()) {
                    $row->setActiveRow();
                }

                $row->addText($contentType->getTypeLabel());
                $row->addText($geoRow->place);

                $row->addText($geoRow->coordinate->getText());


                $geoDistance = new GeoCoordinateDistance();
                $geoDistance->geoCoordinateFrom = $geoCoordinate;
                $geoDistance->geoCoordinateTo = $geoRow->coordinate;
                $row->addText($geoDistance->getDistanceText());


                if ($contentType->hasKmlMarker()) {
                    $site = clone(GeoContentKmlSite::$site);
                    $site->addParameter(new GeoIndexParameter($geoRow->id));
                    $row->addSite($site);
                } else {
                    $row->addEmpty();
                }


                /*
                $site = clone(GeoIndexSite::$site);
                $site->addParameter(new ContentParameter($contentType->getContentId()));
                $site->addParameter(new ContentTypeParameter());
                $site->addParameter(new PageParameter());
                $site->addParameter(new GeoIndexParameter($geoRow->id));
                $row->addClickableSite($site);*/


            } else {
                (new LogMessage())->writeError('No Content Type');
            }

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $geoReader;


        return parent::getContent();
    }
}