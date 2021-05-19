<?php

namespace Nemundo\Content\App\Webcam\Content\Webcam;

use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\AbstractImageTimelineContentType;
use Nemundo\Content\App\Webcam\Data\Webcam\Webcam;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamDelete;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamRow;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamUpdate;
use Nemundo\Content\App\Webcam\Data\WebcamImage\WebcamImageReader;
use Nemundo\Content\App\Webcam\Parameter\WebcamParameter;
use Nemundo\Content\App\Webcam\Site\WebcamItemSite;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractSearchContentType;
use Nemundo\Db\Sql\Order\SortOrder;

class WebcamContentType extends AbstractImageTimelineContentType  // AbstractSearchContentType
{

    //use GeoIndexTrait;

    /*
    public $webcam;

    public $imageUrl;

    public $sourceUrl = '';

    /**
     * @var bool
     */
   // public $imageCrawler = false;


    protected function loadContentType()
    {
        $this->typeLabel = 'Webcam';
        $this->typeId = '5bb3d1d4-3866-4c7e-83f4-572a9c00c9e5';
        $this->formClassList[] = WebcamContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = WebcamContentView::class;
        $this->listingClass = WebcamContentList::class;
        $this->adminClass = WebcamContentAdmin::class;

        $this->viewSite = WebcamItemSite::$site;
        $this->parameterClass = WebcamParameter::class;


    }

    protected function onCreate()
    {

        $data = new Webcam();
        $data->webcam = $this->webcam;
        $data->imageUrl = $this->imageUrl;
        $data->sourceUrl = $this->sourceUrl;
        $data->imageCrawler = $this->imageCrawler;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new WebcamUpdate();
        $update->webcam = $this->webcam;
        $update->imageUrl = $this->imageUrl;
        $update->sourceUrl = $this->sourceUrl;
        $update->imageCrawler = $this->imageCrawler;
        $update->updateById($this->dataId);

    }


    protected function onIndex()
    {

        $this->addSearchText($this->getDataRow()->webcam);

    }


    protected function onDelete()
    {
        (new WebcamDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {
        $this->dataRow = (new WebcamReader())->getRowById($this->dataId);
    }

    /**
     * @return WebcamRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }

    public function getSubject()
    {
        return $this->getDataRow()->webcam;
    }


    public function getData()
    {

        $data['webcam'] = $this->getDataRow()->webcam;
        $data['image_url'] = $this->getDataRow()->imageUrl;

        return $data;

    }


    public function importJson($data)
    {

        $this->webcam = $data['webcam'];
        $this->imageUrl = $data['image_url'];

        $this->saveType();

    }


    public function getWebcamImageReader()
    {

        $reader = new WebcamImageReader();
        $reader->filter->andEqual($reader->model->webcamId, $this->dataId);
        $reader->addOrder($reader->model->dateTime, SortOrder::DESCENDING);
        $reader->limit = 20;

        return $reader;

    }

}