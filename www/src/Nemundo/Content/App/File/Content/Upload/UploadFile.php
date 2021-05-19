<?php


namespace Nemundo\Content\App\File\Content\Upload;


use Nemundo\Content\App\File\Content\Audio\AudioContentType;
use Nemundo\Content\App\File\Content\Document\DocumentContentType;
use Nemundo\Content\App\File\Content\File\FileContentType;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\App\File\Content\Video\VideoContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\FileInformation;
use Nemundo\Model\Data\Property\File\FileProperty;

class UploadFile extends AbstractBase
{

    /**
     * @var FileProperty
     */
    public $file;

    public $parentId;


    public function __construct()
    {
        $this->file = new FileProperty();
    }


    public function uploadFile()
    {


        if ($this->file->hasFilename()) {
            $filename = $this->file->getFilename();
        }

        if ($this->file->hasUrl()) {
            $filename = $this->file->getUrl();
        }

        if ($this->file->hasFileRequest()) {
            $filename = $this->file->getFileRequest()->filename;
        }

        $file = new FileInformation($filename);

        $type = new FileContentType();

        if ($file->isText()) {
            $type = new DocumentContentType();
        }

        if ($file->isPdf()) {
            $type = new DocumentContentType();
        }

        if ($file->isImage()) {
            $type = new ImageContentType();
        }

        if ($file->isAudio()) {
            $type = new AudioContentType();
        }

        if ($file->isVideo()) {
            $type = new VideoContentType();
        }

        $type->file = $this->file;
        //$type->parentId = $this->parentId;
        $type->saveType();

    }

}