<?php

namespace Nemundo\Content\App\Video\Content\IframeVideo;

use Nemundo\Content\App\Video\Data\IframeVideo\IframeVideoModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class IframeVideoContentForm extends AbstractContentForm
{
    /**
     * @var IframeVideoContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $subject;

    /**
     * @var BootstrapTextBox
     */
    private $sourceUrl;

    public function getContent()
    {

        $model = new IframeVideoModel();

        $this->subject = new BootstrapTextBox($this);
        $this->subject->label = 'Title';  // $model->subject->label;
        $this->subject->validation=true;

        $this->sourceUrl = new BootstrapTextBox($this);
        $this->sourceUrl->label = 'Iframe Url';  // $model->sourceUrl->label;
        $this->sourceUrl->validation=true;

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $iframeVideoRow=$this->contentType->getDataRow();

        $this->subject->value=$iframeVideoRow->subject;
        $this->sourceUrl->value=$iframeVideoRow->sourceUrl;

    }


    public function onSubmit()
    {

        $this->contentType->subject=$this->subject->getValue();
        $this->contentType->sourceUrl = $this->sourceUrl->getValue();
        $this->contentType->saveType();

    }

}