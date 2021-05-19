<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline;

use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class ImageTimelineContentForm extends AbstractContentForm
{

    /**
     * @var ImageTimelineContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $timeline;

    /**
     * @var BootstrapTextBox
     */
    private $imageUrl;

    /**
     * @var BootstrapTextBox
     */
    private $source;

    /**
     * @var BootstrapTextBox
     */
    private $sourceUrl;


    public function getContent()
    {

        $model = new ImageTimelineModel();

        $this->timeline = new BootstrapTextBox($this);
        $this->timeline->label = $model->timeline->label;
        $this->timeline->validation = true;

        $this->imageUrl = new BootstrapTextBox($this);
        $this->imageUrl->label = $model->imageUrl->label;
        $this->imageUrl->validation = true;
        $this->imageUrl->validationType=ValidationType::IS_URL;

        $this->source=new BootstrapTextBox($this);
        $this->source->label = $model->source->label;

        $this->sourceUrl=new BootstrapTextBox($this);
        $this->sourceUrl->label = $model->sourceUrl->label;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $row = $this->contentType->getDataRow();

        $this->timeline->value=$row->timeline;
        $this->imageUrl->value=$row->imageUrl;

    }


    public function onSubmit()
    {

        $this->contentType->timeline = $this->timeline->getValue();
        $this->contentType->imageUrl = $this->imageUrl->getValue();
        $this->contentType->crawling=true;
        $this->contentType->saveType();

    }
}