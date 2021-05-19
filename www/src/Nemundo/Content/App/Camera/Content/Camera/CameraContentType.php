<?php

namespace Nemundo\Content\App\Camera\Content\Camera;

use Nemundo\Content\App\Camera\Data\Camera\Camera;
use Nemundo\Content\App\Camera\Data\Camera\CameraDelete;
use Nemundo\Content\App\Camera\Data\Camera\CameraReader;
use Nemundo\Content\App\Camera\Data\Camera\CameraRow;
use Nemundo\Content\Index\Calendar\DateTimeIndexTrait;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Http\Request\File\FileRequest;
use Nemundo\Core\Image\Exif\Exif;
use Nemundo\Core\Image\ImageFile;

class CameraContentType extends AbstractContentType
{

    use DateTimeIndexTrait;


    //use ImageIndexTrait;

    /**
     * @var FileRequest
     */
    //public $image;


    protected function loadContentType()
    {
        $this->typeLabel = 'Camera';
        $this->typeId = 'd7ce44a9-7a62-4c88-9e48-7859df3de1b2';
        $this->formClassList[] = CameraContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = CameraContentView::class;
        $this->listingClass = CameraContentListing::class;
    }


    /*
    protected function onCreate()
    {

        $exif = new Exif($this->image->tmpFileName);

        //(new Debug())->write($exif->dateTime);
        //exit;


        $image = new ImageFile($this->image->tmpFileName);

        $data = new Camera();
        $data->image->fromFileRequest($this->image);
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
        $this->dataId = $data->save();


        // image index

    }*/

    protected function onUpdate()
    {
    }


    protected function onDelete()
    {
        (new CameraDelete())->deleteById($this->dataId);
    }


    protected function onIndex()
    {

        // $this->saveImageIndex();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new CameraReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|CameraRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        //return $this->getDataRow()->image->getFilename();

        $subject= $this->getDataRow()->dateTime->getLongFormat();  //getShortDateTimeLeadingZeroFormat();
        return $subject;


    }


    public function getDate()
    {
        return $this->getDataRow()->dateTime->getDate();
    }


    public function getDateTime()
    {
        return $this->getDataRow()->dateTime;
    }




    protected function getImageFilename()
    {
        return $this->getDataRow()->image->getFullFilename();
    }


}