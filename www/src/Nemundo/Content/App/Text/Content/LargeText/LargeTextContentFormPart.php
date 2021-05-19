<?php


namespace Nemundo\Content\App\Text\Content\LargeText;


use Nemundo\Content\Form\AbstractContentFormPart;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Content\Form\AbstractContentForm;

class LargeTextContentFormPart extends AbstractContentFormPart
{

    /**
     * @var AbstractLargeTextContentType
     */
    public $contentType;

    /**
     * @var BootstrapLargeTextBox
     */
    protected $largeText;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->largeText = new BootstrapLargeTextBox($this);

    }


    protected function loadUpdateForm()
    {

        $this->largeText->value = $this->contentType->getDataRow()->largeText;

    }


    public function saveData()
    {

        $this->contentType->largeText = $this->largeText->getValue();
        //return $this->contentType->saveType()->getDataId();
        return $this->contentType->saveType()->getContentId();  //DataId();

    }



}