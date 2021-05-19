<?php


namespace Nemundo\Content\App\ImageGallery\Content\ImageGallery\Form;


use Nemundo\Content\App\ImageGallery\Data\Image\ImageDelete;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class ImageDeleteForm extends BootstrapForm
{

    public $imageId;

    protected function onSubmit()
    {


        (new ImageDelete())->deleteById($this->imageId);



    }

}