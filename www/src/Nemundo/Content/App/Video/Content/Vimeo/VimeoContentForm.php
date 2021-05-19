<?php


namespace Nemundo\Content\App\Video\Content\Vimeo;


use Nemundo\Content\App\Video\Data\Vimeo\VimeoModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class VimeoContentForm extends AbstractContentForm
{

    /**
     * @var VimeoContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $vimeoId;


    public function getContent()
    {

        $model = new VimeoModel();

        $this->vimeoId = new BootstrapTextBox($this);
        $this->vimeoId->label = $model->vimeoId->label;
        $this->vimeoId->validation = true;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $this->contentType->vimeoId = $this->vimeoId->getValue();
        $this->contentType->saveType();

    }

}