<?php

namespace Nemundo\Content\App\ImageGallery\Content\ImageGallery\Form;

use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\ImageGallery\Content\ImageGallery\ImageGalleryContentBuilder;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\Data\Property\File\FileProperty;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class ImageForm extends AbstractAdminForm
{
    /**
     * @var ImageGalleryContentBuilder
     */
    public $contentType;

    /**
     * @var BootstrapFileUpload
     */
    private $upload;

    public function getContent()
    {

        $this->upload = new BootstrapFileUpload($this);
        $this->upload->label = 'Image';
        $this->upload->acceptFileType = AcceptFileType::IMAGE;
        $this->upload->multiUpload = true;

        $table = new AdminTable($this);

        $imageReader = $this->contentType->getDataReader();
        foreach ($imageReader->getData() as $imageRow) {

            $row = new TableRow($table);

            $img = new BootstrapResponsiveImage($row);
            $img->src = $imageRow->image->getImageUrl($imageReader->model->imageAutoSize400);

            $form = new ImageDeleteForm($row);
            $form->imageId=$imageRow->id;
            $form->submitButton->label='Delete';

        }


        return parent::getContent();
    }


    public function onSubmit()
    {

        foreach ($this->upload->getMultiFileRequest() as $fileRequest) {
            $this->contentType->addImage((new FileProperty())->fromFileRequest($fileRequest));
        }




    }
}