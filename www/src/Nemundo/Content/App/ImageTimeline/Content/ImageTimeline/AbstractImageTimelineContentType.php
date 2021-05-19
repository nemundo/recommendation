<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline;

use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentType;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View\ImageTimelineLatestContentView;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View\ImageTimelineRemoteContentView;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View\ImageTimelineSliderContentView;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimeline;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineCount;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineDelete;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineId;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineReader;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineRow;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractSearchContentType;

abstract class AbstractImageTimelineContentType extends AbstractSearchContentType
{

    public $timeline;

    public $imageUrl;

    public $source;

    public $sourceUrl;

    /**
     * @var bool
     */
    public $crawling = false;


    public $crawlingIntervall = 10;

    // Intervall

    protected function loadContentType()
    {

        $this->typeLabel = 'Image Timeline';
        $this->typeId = '63e62295-48a6-41ae-b431-022682ea485c';
        $this->formClassList[] = ImageTimelineContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;

        $this->viewClassList[] = ImageTimelineSliderContentView::class;
        $this->viewClassList[] = ImageTimelineLatestContentView::class;
        $this->viewClassList[] = ImageTimelineRemoteContentView::class;

        $this->listingClass = ImageTimelineContentListing::class;

    }

    protected function onCreate()
    {

        $data = new ImageTimeline();
        $data->timeline = $this->timeline;
        $data->imageUrl = $this->imageUrl;
        $data->source = $this->source;
        $data->sourceUrl = $this->sourceUrl;
        $data->crawling = $this->crawling;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new ImageTimelineUpdate();
        $update->timeline = $this->timeline;
        $update->imageUrl = $this->imageUrl;
        $update->source = $this->source;
        $update->sourceUrl = $this->sourceUrl;
        $update->crawling = $this->crawling;
        $update->updateById($this->dataId);

    }

    protected function onDelete()
    {

        // image delete

        $reader = new ImageReader();
        $reader->filter->andEqual($reader->model->timelineId,$this->getDataId());
        foreach($reader->getData() as $imageRow) {
            (new ImageContentType($imageRow->id))->deleteType();
        }


        (new ImageTimelineDelete())->deleteById($this->dataId);


    }

    protected function onIndex()
    {

        $this->addSearchText($this->getDataRow()->timeline);


    }

    protected function onDataRow()
    {
        $this->dataRow = (new ImageTimelineReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ImageTimelineRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->timeline;
    }


    public function existItem()
    {


        $value = parent::existItem();

        //$value = false;

        if (!$value) {

            $count = new ImageTimelineCount();
            $count->filter->andEqual($count->model->imageUrl, $this->imageUrl);
            if ($count->getCount() == 1) {
                $value = true;

                $id = new ImageTimelineId();
                $id->filter->andEqual($count->model->imageUrl, $this->imageUrl);
                $this->dataId = $id->getId();

            }

        }

        return $value;

    }


    public function downloadImage()
    {


    }


}