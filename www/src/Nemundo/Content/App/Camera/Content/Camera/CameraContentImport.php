<?php

namespace Nemundo\Content\App\Camera\Content\Camera;


use Nemundo\Content\App\Camera\Data\Camera\Camera;
use Nemundo\Content\Index\Calendar\DateTimeIndexTrait;
use Nemundo\Content\Type\AbstractContentImport;
use Nemundo\Content\Type\Index\ContentIndexBuilder;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Http\Request\File\AbstractFileRequest;
use Nemundo\Core\Image\Exif\Exif;
use Nemundo\Core\Image\ImageFile;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\CurlWebRequest;
use Nemundo\Project\Path\TmpPath;

class CameraContentImport extends AbstractContentImport
{


    public function fromFilename($filename)
    {

        $exif = new Exif($filename);
        $image = new ImageFile($filename);

        $data = new Camera();
        $data->image->fromFilename($filename);
        $data->camera = $exif->camera;

        if ($exif->hasDateTime) {
            $data->dateTime = $exif->dateTime;
            $data->date = $exif->dateTime->getDate();
            $data->year = $exif->dateTime->getYear();
        }

        if ($exif->hasCoordinate()) {

        }

        $data->width = $image->width;
        $data->height = $image->height;
        $data->filesize = $image->getFileSize();
        $dataId = $data->save();

        (new ContentIndexBuilder((new CameraContentType($dataId))))->buildIndex();

        (new File($filename))->deleteFile();

        return $dataId;

    }


    public function fromUrl($url)
    {

        $filename = (new TmpPath())
            ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))
            ->getFilename();

        (new CurlWebRequest())->downloadUrl($url, $filename);

        $dataId=$this->fromFilename($filename);

        return $dataId;

    }



    public function fromFileRequest(AbstractFileRequest $fileRequest)
    {

        $filename = $this->getTmpFilename();
        $fileRequest->saveFile($filename);

        $dataId = $this->fromFilename($filename);


        return $dataId;

    }


    private function getTmpFilename() {

        $filename = (new TmpPath())
            ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))
            ->getFilename();

        return $filename;

    }


}