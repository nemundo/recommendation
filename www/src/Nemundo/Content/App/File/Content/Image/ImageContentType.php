<?php

namespace Nemundo\Content\App\File\Content\Image;


use Nemundo\Content\App\File\Content\File\AbstractFileContentType;
use Nemundo\Content\App\File\Content\File\UrlFileContentForm;
use Nemundo\Content\App\File\Content\Image\View\ImageContentView;
use Nemundo\Content\App\File\Content\Image\View\ImageDetailContentView;
use Nemundo\Content\App\File\Content\Image\View\ImageFancyboxContentView;
use Nemundo\Content\App\File\Data\Image\Image;
use Nemundo\Content\App\File\Data\Image\ImageDelete;
use Nemundo\Content\App\File\Data\Image\ImageReader;
use Nemundo\Content\App\File\Data\Image\ImageRow;
use Nemundo\Content\App\File\Data\Image\ImageUpdate;
use Nemundo\Content\App\File\Type\ImageIndexTrait;
use Nemundo\Content\Index\Calendar\DateTimeIndexTrait;
use Nemundo\Core\File\Base64File;
use Nemundo\Core\Image\ImageFile;

class ImageContentType extends AbstractFileContentType
{

    use ImageIndexTrait;
    use DateTimeIndexTrait;

    protected function loadContentType()
    {
        $this->typeLabel = 'Image';
        $this->typeId = '7e9bcfda-c76a-43b2-96e7-6525f090d4ae';

        $this->formClassList[] = ImageContentForm::class;
        $this->formClassList[] = UrlFileContentForm::class;
        $this->formClassList[] = ImageContentSearchForm::class;
        $this->formPartClass = ImageContentFormPart::class;

        $this->viewClassList[] = ImageFancyboxContentView::class;
        $this->viewClassList[] = ImageContentView::class;
        $this->viewClassList[] = ImageDetailContentView::class;

        $this->listingClass = ImageContentListing::class;

    }


    protected function onCreate()
    {

        $data = new Image();
        $data->image->fromFileProperty($this->file);
        $data->orginalFilename = $this->file->getOrginalFilename();
        $this->dataId = $data->save();

        $this->onDataRow();
        $imageRow = $this->getDataRow();

        $filename = $imageRow->image->getFullFilename();

        $imageFile = new ImageFile($filename);

        $update = new ImageUpdate();
        $update->fileExtension = $imageFile->getFileExtension();
        $update->fileSize = $imageFile->getFileSize();
        $update->imageWidth = $imageFile->width;
        $update->imageHeight = $imageFile->height;
        $update->dateTime = $imageFile->getCreateDateTime();
        $update->updateById($this->dataId);

    }

    protected function onUpdate()
    {

        // rename

    }


    protected function onDelete()
    {
        (new ImageDelete())->deleteById($this->dataId);
    }

    protected function onIndex()
    {

        $this->saveImageIndex();

    }


    protected function onDataRow()
    {

        $this->dataRow = (new ImageReader())->getRowById($this->dataId);

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ImageRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    protected function getImageFilename()
    {
        return $this->getDataRow()->image->getFullFilename();
    }


    public function getSubject()
    {
        return $this->getDataRow()->orginalFilename;
    }


    public function getDateTime()
    {
        return $this->getDataRow()->dateTime;
    }


    public function getData()
    {

        $data = [];
        $data['filename'] = $this->getDataRow()->orginalFilename;
        $data['base64'] = (new Base64File($this->getDataRow()->image->getFullFilename()))->getBase64();

        return $data;

    }


}