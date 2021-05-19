<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Image;


use Nemundo\Content\App\ImageTimeline\Data\Image\Image;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageCount;
use Nemundo\Content\Type\Index\ContentIndexBuilder;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Image\ImageFile;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Project\Path\TmpPath;

class ImageContentImport extends AbstractBase
{

    /**
     * @var DateTime
     */
    public $dateTime;

    public $timelineId;

    public $imageUrl;


    public function __construct()
    {

        $this->dateTime = (new DateTime())->setNow();

    }


    public function importContent()
    {

        $filenameTmp = (new TmpPath())
            ->addPath((new UniqueFilename())->getUniqueFilename())
            ->getFullFilename();


        $download = new WebRequest();
        $result = $download->downloadUrl($this->imageUrl, $filenameTmp);

        $extension = (new ImageFile($filenameTmp))->getImageFileExtension();
        $filename=$filenameTmp. $extension;

        (new File($filenameTmp))->renameFile($filename);


        //https://api.sat24.com/mostrecent/EU/visual5hdcomplete


        // (new Debug())->write($this->imageUrl);
        // (new Debug())->write($result);

        if ($result) {

            //(new Debug())->write($filename);

            $file = new File($filename);

            if ($file->isImage()) {

                $hash = $file->getHash();

                $count = new ImageCount();
                $count->filter->andEqual($count->model->timelineId, $this->timelineId);
                $count->filter->andEqual($count->model->hash, $hash);
                if ($count->getCount() == 0) {

                    $data = new Image();
                    $data->timelineId = $this->timelineId;
                    $data->image->fromFilename($filename);
                    $data->hash = $hash;
                    $data->dateTime = $this->dateTime;
                    $dataId = $data->save();

                    $contentType = new ImageContentType($dataId);

                    (new ContentIndexBuilder($contentType))->buildIndex();

                }

            } else {

                (new LogMessage())->writeError('No valid image. Image Url: ' . $this->imageUrl);

            }

            $file->deleteFile();

        }

    }

}