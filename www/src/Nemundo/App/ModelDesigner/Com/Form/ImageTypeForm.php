<?php

namespace Nemundo\App\ModelDesigner\Com\Form;


use Nemundo\App\ModelDesigner\Collection\ImageFormatCollection;
use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Type\ImageModelDesignerType;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class ImageTypeForm extends BootstrapForm
{

    /**
     * @var AppJson
     */
    public $app;

    /**
     * @var ImageModelDesignerType
     */
    public $type;

    /**
     * @var BootstrapListBox
     */
    private $resizeType;

    /**
     * @var BootstrapTextBox
     */
    private $size;


    public function getContent()
    {

        $this->resizeType = new BootstrapListBox($this);
        $this->resizeType->label = 'Resize Type';
        $this->resizeType->validation = true;
        //$this->resizeType->emptyValueAsDefault=false;

        foreach ((new ImageFormatCollection())->getImageFormatCollection() as $imageFormat) {
            $this->resizeType->addItem($imageFormat->imageFormatName, $imageFormat->imageFormatLabel);
        }

        $this->size = new BootstrapTextBox($this);
        $this->size->label = 'Size';
        $this->size->size = 3;
        $this->size->validation = true;
        $this->size->validationType = ValidationType::IS_NUMBER;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $format = (new ImageFormatCollection())->getImageFormat($this->resizeType->getValue());
        $format->size = $this->size->getValue();


        if ($format->isObjectOfClass(AutoSizeModelImageFormat::class)) {
        $format->size = $this->size->getValue();
        }

        if ($format->isObjectOfClass(FixWidthModelModelImageFormat::class)) {
            $format->width = $this->size->getValue();
        }

        if ($format->isObjectOfClass(FixHeightModelImageFormat::class)) {
            $format->height = $this->size->getValue();
        }

        $this->type->addFormat($format);

        $this->app->writeJson();

    }

}