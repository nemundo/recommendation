<?php

namespace Nemundo\Content\App\ImageTimeline\Content\TimelapseJob;

use Nemundo\App\Application\Usergroup\AdminUsergroup;
use Nemundo\App\SystemLog\Message\SystemLogMessage;
use Nemundo\Content\App\ImageTimeline\Application\ImageTimelineApplication;
use Nemundo\Content\App\ImageTimeline\Cmd\TimelapseCmd;
use Nemundo\Content\App\ImageTimeline\Content\TimelapseVideo\TimelapseVideoContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\App\ImageTimeline\Data\TimelapseJob\TimelapseJobReader;
use Nemundo\Content\App\ImageTimeline\Data\TimelapseJob\TimelapseJobRow;
use Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo\TimelapseVideo;
use Nemundo\Content\App\ImageTimeline\Path\ImageTimelineTmpPath;
use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Content\App\Notification\Builder\NotificationBuilder;
use Nemundo\Content\Type\Index\ContentIndexBuilder;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Type\File\File;
use Nemundo\Project\Path\TmpPath;


class TimelapseJobContentType extends AbstractJobContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Timelapse Job';
        $this->typeId = 'f1e1a140-c9e8-44df-9576-a4e1c46055ae';
        $this->formClassList[] = TimelapseJobContentForm::class;
    }


    protected function onDataRow()
    {
        $reader = new TimelapseJobReader();
        $reader->model->loadImageTimeline();
        $this->dataRow = $reader->getRowById($this->getDataId());
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|TimelapseJobRow
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


    public function run()
    {

        $jobRow = $this->getDataRow();

        (new ImageTimelineTmpPath())
            ->createPath()
            ->emptyDirectory();

        $count = 0;
        $fileExtension =null;

        $reader = new ImageReader();
        $reader->filter->andEqual($reader->model->timelineId, $jobRow->imageTimelineId);
        $reader->filter->andEqualOrGreater($reader->model->dateTime, $jobRow->dateTimeFrom->getIsoDateTime());
        $reader->filter->andEqualOrSmaller($reader->model->dateTime, $jobRow->dateTimeTo->getIsoDateTime());
        $reader->addOrder($reader->model->id);
        foreach ($reader->getData() as $imageRow) {

            $count++;

            $filename = $imageRow->image->getFullFilename();
            $fileExtension = (new File($filename))->getFileExtension();

            $copy = new FileCopy();
            $copy->sourceFilename = $imageRow->image->getImageFullFilename($imageRow->model->imageAutoSize800);
            $copy->destinationFilename = (new ImageTimelineTmpPath())
                ->addPath($count . '.'.$fileExtension)
                ->getFullFilename();
            $copy->copyFile();

        }

        $videoFilename = (new TmpPath())
            ->addPath((new UniqueFilename())->getUniqueFilename('mp4'))
            ->getFullFilename();

        $videoFile = new File($videoFilename);

        $cmd = new TimelapseCmd();
        $cmd->framerate = 10;
        $cmd->imagePath = (new ImageTimelineTmpPath())
            ->addPath('%d.'.$fileExtension)
            ->getFullFilename();
        $cmd->videoFilename = $videoFilename;
        $output = $cmd->createVideo();


        if ($videoFile->fileExists()) {

            $data = new TimelapseVideo();
            $data->imageTimelineId = $jobRow->imageTimelineId;
            $data->dateTimeFrom = $jobRow->dateTimeFrom;
            $data->dateTimeTo = $jobRow->dateTimeTo;
            $data->video->fromFilename($videoFilename);
            $dataId = $data->save();

            $timelapseContentType = new TimelapseVideoContentType($dataId);
            (new ContentIndexBuilder($timelapseContentType))->buildIndex();

            foreach ((new AdminUsergroup())->getUserList() as $userRow) {
                $builder = new NotificationBuilder($timelapseContentType);
                $builder->createNotification($userRow->id);
            }

            (new SystemLogMessage(new ImageTimelineApplication()))->logInformation('Timelapse Created');


        } else {

            (new SystemLogMessage(new ImageTimelineApplication()))->logError($output);

        }

        $videoFile->deleteFile();

    }

}