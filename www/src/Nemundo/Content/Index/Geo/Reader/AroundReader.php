<?php


namespace Nemundo\Content\Index\Geo\Reader;


use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexPaginationReader;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Content\Index\Geo\Parameter\GeoIndexParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Geo\Distance\GeoCoordinateDistance;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Model\Filter\GeoCoordinateSquareFilter;

class AroundReader extends AbstractDataSource
{

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinate;

    public $distanceInKilometres=10;

    public function  __construct() {

        $this->geoCoordinate=new GeoCoordinate();

    }


    protected function loadData()
    {


        $geoReader = new GeoIndexReader();  // PaginationReader();
        $geoReader->model->loadContent();
        $geoReader->model->content->loadContentType();


        $filter = new GeoCoordinateSquareFilter();
        $filter->coordinateCenter = $this->geoCoordinate;
        $filter->coordinateType = $geoReader->model->coordinate;
        $filter->distanceInKilometres =$this->distanceInKilometres;

        $geoReader->filter->andFilter($filter);


        /*
        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        if ($contentTypeParameter->hasValue()) {
            $geoReader->filter->andEqual($geoReader->model->content->contentTypeId, $contentTypeParameter->getValue());
        }

        $geoReader->addOrder($geoReader->model->place);*/

        foreach ($geoReader->getData() as $geoRow) {

            //$content = $geoRow->content->getContentType();

            $item = new AroundItem();
            $item->content =$geoRow->content->getContentType();
            $item->geoIndexId=$geoRow->id;


            $geoDistance = new GeoCoordinateDistance();
            $geoDistance->geoCoordinateFrom = $this->geoCoordinate;
            $geoDistance->geoCoordinateTo = $geoRow->coordinate;

            $item->distance =$geoDistance->getDistanceText();


            $this->addItem($item);


            /*
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

/*
            } else {
                (new LogMessage())->writeError('No Content Type');
            }*/

        }



    }


    /**
     * @return AroundItem[]
     */
    public function getData()
    {
        return parent::getData();
    }


}