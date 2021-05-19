<?php

namespace Nemundo\Content\App\Webcam\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Content\App\Webcam\Data\WebcamImage\WebcamImage;
use Nemundo\Content\App\Webcam\Data\WebcamImage\WebcamImageCount;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Meteo\Dwd\Data\MapImage\MapImage;
use Nemundo\Meteo\Dwd\Data\MapImage\MapImageCount;
use Nemundo\Meteo\Dwd\Path\DwdTmpPath;
use Nemundo\Project\Path\TmpPath;

class WebcamImageCrawlerScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        $this->active=true;
        $this->minute = 2;

        $this->consoleScript=true;
        $this->scriptName='webcam-crawler';


    }

    public function run()
    {


        $webcamReader=new WebcamReader();
        $webcamReader->filter->andEqual($webcamReader->model->imageCrawler,true);
        foreach ($webcamReader->getData() as $webcamRow) {


//(new Debug())->write($webcamRow->imageUrl);

            $filename = (new TmpPath())
                ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))
                ->getFilename();

            $download = new WebRequest();
            $download->downloadUrl($webcamRow->imageUrl, $filename);

            $file = new File($filename);
            $hash = $file->getHash();

            $count = new WebcamImageCount();
            $count->filter->andEqual($count->model->hash, $hash);
            if ($count->getCount() == 0) {

                $data = new WebcamImage();
                $data->webcamId=$webcamRow->id;
                $data->image->fromFilename($filename);
                $data->hash = $hash;
                $data->save();

            }

            $file->deleteFile();



        }


    }


}