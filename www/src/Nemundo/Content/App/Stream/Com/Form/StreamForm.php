<?php


namespace Nemundo\Content\App\Stream\Com\Form;


use Nemundo\Content\App\Stream\Data\Stream\Stream;
use Nemundo\Content\Form\AbstractContentFormPart;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;

class StreamForm extends BootstrapForm
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var BootstrapLargeTextBox
     */
    private $message;

    /**
     * @var AbstractContentFormPart
     */
    private $formPart;


    public function getContent()
    {

        $this->message = new BootstrapLargeTextBox($this);
        $this->message->label='Message';

        $this->formPart = $this->contentType->getFormPart($this);

        return parent::getContent();

    }


    protected function onSubmit()
    {


        $data = new Stream();
        $data->contentId = $this->formPart->saveData();
        $data->hasMessage = true;
        $data->message = $this->message->getValue();
        $data->active = true;
        $data->contentViewId = $this->contentType->getDefaultViewId();
        $data->save();

    }


}