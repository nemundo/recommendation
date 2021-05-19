<?php


namespace Nemundo\Content\Index\Geo\Reader;


use Nemundo\Content\Index\Geo\Data\Distance\DistanceReader;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Db\Filter\Filter;

class GeoDistanceReader extends AbstractDataSource
{


    public $contentId;


    public $limit = 100;

    /**
     * @var AbstractContentType[]
     */
    private $contentTypeFilterList=[];

    public function filterByDistance()
    {

    }


    public function addContentTypeFilter(AbstractContentType $contentType)
    {

        $this->contentTypeFilterList[] = $contentType;
        return $this;

    }


    protected function loadData()
    {

        $reader = new DistanceReader();
        $reader->model->loadContentTo();
        $reader->model->contentTo->loadContentType();
        $reader->filter->andEqual($reader->model->contentFromId, $this->contentId);

        if (sizeof($this->contentTypeFilterList) > 0) {

            $reader->model->loadContentFrom();

            $filter = new Filter();
            foreach ($this->contentTypeFilterList as $contentType) {
                $filter->orEqual($reader->model->contentTo->contentTypeId, $contentType->typeId);
            }
            $reader->filter->andFilter($filter);
        }


        $reader->addOrder($reader->model->distance);
        $reader->limit = $this->limit;

        foreach ($reader->getData() as $distanceRow) {

            $item = new GeoDistanceItem();
            $item->contentId = $distanceRow->contentToId;
            $item->distance = $distanceRow->distance;

            $this->addItem($item);

        }


    }


    /**
     * @return GeoDistanceItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

}