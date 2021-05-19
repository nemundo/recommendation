<?php

namespace Nemundo\Content\Index\Geo\Index;


use Nemundo\Content\Index\Geo\Data\Distance\DistanceDelete;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexDelete;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\Index\AbstractIndexBuilder;


class GeoIndexBuilder extends AbstractIndexBuilder
{

    /**
     * @var GeoIndexTrait|AbstractContentType
     */
    protected $contentType;
    // content

    public function buildIndex()
    {

        $data = new GeoIndex();
        $data->updateOnDuplicate = true;
        $data->place = $this->contentType->getSubject();
        $data->coordinate =  $this->contentType->getCoordinate();
        $data->contentId = $this->contentType->getContentId();
        $data->save();

        return $this;

    }


    public function deleteIndex()
    {

        $delete = new GeoIndexDelete();
        $delete->filter->andEqual($delete->model->contentId, $this->contentType->getContentId());
        $delete->delete();

        $delete = new DistanceDelete();
        $delete->filter->orEqual($delete->model->contentFromId, $this->contentType->getContentId());
        $delete->filter->orEqual($delete->model->contentToId, $this->contentType->getContentId());
        $delete->delete();

    }




    // removeIndexByContentType
    public function removeAllIndex()
    {

        $delete = new GeoIndexDelete();
        $delete->model->loadContent();
        $delete->filter->andEqual($delete->model->content->contentTypeId, $this->contentType->typeId);
        $delete->delete();

        $delete = new DistanceDelete();
        $delete->model->loadContentFrom();
        $delete->filter->andEqual($delete->model->contentFrom->contentTypeId, $this->contentType->typeId);
        $delete->delete();

        $delete = new DistanceDelete();
        $delete->model->loadContentTo();
        $delete->filter->andEqual($delete->model->contentTo->contentTypeId, $this->contentType->typeId);
        $delete->delete();






    }


}