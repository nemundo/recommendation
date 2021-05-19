<?php

namespace Nemundo\Content\App\ImageGallery\Content\ImageGallery;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\ImageGallery\Data\Image\ImageReader;
use Nemundo\Content\App\ImageGallery\Parameter\ImageParameter;
use Nemundo\Content\App\ImageGallery\Site\ImageDeleteSite;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\Data\Property\File\FileProperty;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class ImageGalleryContentForm extends AbstractContentForm
{
    /**
     * @var ImageGalleryContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $imageGallery;

    /**
     * @var BootstrapFileUpload
     */
    private $upload;

    public function getContent()
    {

        $this->imageGallery = new BootstrapTextBox($this);
        $this->imageGallery->label = 'Image Gallery';
        $this->imageGallery->validation=true;

        $this->upload = new BootstrapFileUpload($this);
        $this->upload->label = 'Image';
        $this->upload->acceptFileType= AcceptFileType::IMAGE;
        $this->upload->multiUpload = true;

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $row = $this->contentType->getDataRow();
        $this->imageGallery->value = $row->imageGallery;

        $table=new AdminTable($this);

        $imageReader=new ImageReader();
        $imageReader->filter->andEqual($imageReader->model->galleryId,$this->contentType->getDataId());
        foreach ($imageReader->getData() as $imageRow) {

            $row=new TableRow($table);

            $img=new BootstrapResponsiveImage($row);
            $img->src = $imageRow->image->getImageUrl($imageRow->model->imageAutoSize400);

            /*
            $site=clone(ImageDeleteSite::$site);
            $site->addParameter(new ImageParameter($imageRow->id));
            $row->addIconSite($site);*/

        }

    }


    public function onSubmit()
    {

        $this->contentType->imageGallery = $this->imageGallery->getValue();
        $this->contentType->saveType();

        foreach ($this->upload->getMultiFileRequest() as $fileRequest) {

           $this->contentType->addImage((new FileProperty())->fromFileRequest($fileRequest));

        }


    }
}