<?php

namespace Nemundo\Content\App\ImageTimeline\Site;

use Nemundo\Admin\Parameter\Date\DateFromParameter;
use Nemundo\Admin\Parameter\Date\DateToParameter;
use Nemundo\App\Linux\Cmd\Zip7Cmd;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\App\ImageTimeline\Parameter\ImageTimelineParameter;
use Nemundo\Content\App\ImageTimeline\Path\ImageTimelineTmpWebPath;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\FileCopy;
use Nemundo\Project\Path\WebTmpPath;
use Nemundo\Roundshot\App\Timelapse\Local\FfmpegLocalCommand;
use Nemundo\Web\Site\AbstractSite;

class ZipDownloadSite extends AbstractSite
{

    /**
     * @var ZipDownloadSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'ZipDownload';
        $this->url = 'ZipDownload';
        $this->menuActive = false;

        ZipDownloadSite::$site = $this;

    }

    public function loadContent()
    {

        //DbConfig::$sqlDebug=true;


        (new ImageTimelineTmpWebPath())
            ->createPath()
            ->emptyDirectory();

        $count = 0;

        $reader = new ImageReader();
        $reader->filter->andEqual($reader->model->timelineId, (new ImageTimelineParameter())->getValue());
        $reader->filter->andEqualOrGreater($reader->model->dateTime, (new DateFromParameter())->getDate()->getIsoDate() . ' 00:00');
        $reader->filter->andEqualOrSmaller($reader->model->dateTime, (new DateToParameter())->getDate()->getIsoDate() . ' 23:59');
        $reader->addOrder($reader->model->id);  //, SortOrder::DESCENDING);
        //$reader->limit = 20;
        //$reader->reverse = true;
        foreach ($reader->getData() as $imageRow) {
            //    $carousel->addImage($imageRow->image->getImageUrl($imageRow->model->imageAutoSize800));

            (new Debug())->write($imageRow->image->getImageUrl($imageRow->model->imageAutoSize800));


            $count++;

            $copy = new FileCopy();
            $copy->sourceFilename = $imageRow->image->getImageFullFilename($imageRow->model->imageAutoSize800);
            $copy->destinationFilename = (new ImageTimelineTmpWebPath())
                ->addPath($count . '.jpg')
                ->getFullFilename();
            $copy->copyFile();


        }



        $zip=new Zip7Cmd();
        $zip->path = (new ImageTimelineTmpWebPath())->getPath();
        $zip->zipFilename= (new ImageTimelineTmpWebPath())
            ->addPath('export.7z')
            ->getFullFilename();
        $output= $zip->create7Zip();



        $fmepg = new FfmpegLocalCommand();
        $fmepg->framerate = 10;
        $fmepg->imagePath = (new ImageTimelineTmpWebPath())
            ->addPath('%d.jpg')
            ->getFullFilename();
        $fmepg->videoFilename = (new WebTmpPath())
            ->addPath('video.mp4')
            ->getFullFilename();
        $output = $fmepg->createVideo();

        (new Debug())->write($output);


    }


}