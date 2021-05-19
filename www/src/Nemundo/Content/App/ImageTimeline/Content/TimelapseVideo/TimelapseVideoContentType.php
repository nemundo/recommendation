<?php

namespace Nemundo\Content\App\ImageTimeline\Content\TimelapseVideo;

use Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo\TimelapseVideo;
use Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo\TimelapseVideoReader;
use Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo\TimelapseVideoRow;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Roundshot\App\Timelapse\Data\Timelapse\Timelapse;

class TimelapseVideoContentType extends AbstractContentType
{

    //public $imageTimelineId;

    protected function loadContentType()
    {
        $this->typeLabel = 'Timelapse Video';
        $this->typeId = '5a79db95-7275-4de3-ac93-b538ff7e1298';
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = TimelapseVideoContentView::class;
    }

   /* protected function onCreate()
    {

      /*  $data = new TimelapseVideo();
        $data->imageTimelineId = roundshotId = $this->roundshotId;
        $data->date = $this->date;
        $data->video->fromFilename($this->videoFilename);
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
    }*/



    protected function onDataRow()
    {

        $reader = new TimelapseVideoReader();
        $reader->model->loadImageTimeline();
        $this->dataRow = $reader->getRowById($this->getDataId());

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|TimelapseVideoRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        $subject = $this->getDataRow()->imageTimeline->timeline . ' - ' .
            $this->getDataRow()->dateTimeFrom->getShortDateTimeLeadingZeroFormat() .
            ' to ' .
            $this->getDataRow()->dateTimeTo->getShortDateTimeLeadingZeroFormat();

        return $subject;

    }

}