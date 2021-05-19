<?php

namespace Nemundo\Content\App\Webcam\Content\Webcam;

use Nemundo\Content\App\Webcam\Data\Webcam\WebcamModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class WebcamContentForm extends AbstractContentForm
{
    /**
     * @var WebcamContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $webcam;

    /**
     * @var BootstrapTextBox
     */
    private $imageUrl;

    /**
     * @var BootstrapTextBox
     */
    private $sourceUrl;


    /**
     * @var BootstrapCheckBox
     */
    private $imageCrawler;

    public function getContent()
    {

        $model = new WebcamModel();

        $this->webcam = new BootstrapTextBox($this);
        $this->webcam->label = $model->webcam->label;
        $this->webcam->validation = true;

        $this->imageUrl = new BootstrapTextBox($this);
        $this->imageUrl->label = $model->imageUrl->label;
        $this->imageUrl->validation = true;

        $this->sourceUrl = new BootstrapTextBox($this);
        $this->sourceUrl->label = $model->sourceUrl->label;

        $this->imageCrawler = new BootstrapCheckBox($this);
        $this->imageCrawler->label = $model->imageCrawler->label;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $webcamRow = $this->contentType->getDataRow();

        $this->webcam->value = $webcamRow->webcam;
        $this->imageUrl->value = $webcamRow->imageUrl;
        $this->sourceUrl->value = $webcamRow->sourceUrl;
        $this->imageCrawler->value = $webcamRow->imageCrawler;

    }


    public function onSubmit()
    {

        $this->contentType->webcam = $this->webcam->getValue();
        $this->contentType->imageUrl = $this->imageUrl->getValue();
        $this->contentType->sourceUrl = $this->sourceUrl->getValue();
        $this->contentType->imageCrawler = $this->imageCrawler->getValue();
        $this->contentType->saveType();

    }

}