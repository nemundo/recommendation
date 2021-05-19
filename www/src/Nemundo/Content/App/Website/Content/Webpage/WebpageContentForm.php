<?php

namespace Nemundo\Content\App\Website\Content\Webpage;

use Nemundo\Content\App\Website\Data\Webpage\WebpageModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class WebpageContentForm extends AbstractContentForm
{
    /**
     * @var WebpageContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $pageTitle;

    /**
     * @var BootstrapTextBox
     */
    private $description;

    public function getContent()
    {

        $model=new WebpageModel();

        $this->pageTitle=new BootstrapTextBox($this);
        $this->pageTitle->label=$model->title->label;
        $this->pageTitle->validation=true;

        $this->description=new BootstrapLargeTextBox($this);
        $this->description->label=$model->description->label;

        return parent::getContent();
    }

    public function onSubmit()
    {
        $this->contentType->saveType();
    }
}