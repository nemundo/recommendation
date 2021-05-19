<?php

namespace Nemundo\Content\App\Feedback\Content\Feedback;

use Nemundo\Content\App\Feedback\Data\Feedback\FeedbackModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class FeedbackContentForm extends AbstractContentForm
{
    /**
     * @var FeedbackContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $contact;

    /**
     * @var BootstrapTextBox
     */
    private $email;

    /**
     * @var BootstrapLargeTextBox
     */
    private $message;


    public function getContent()
    {

        $model = new FeedbackModel();

        $this->contact = new BootstrapTextBox($this);
        $this->contact->label = $model->contact->label;
        $this->contact->validation = true;

        $this->email = new BootstrapTextBox($this);
        $this->email->label = $model->email->label;
        $this->email->validation = true;
        $this->email->validationType=ValidationType::IS_EMAIL;

        $this->message = new BootstrapLargeTextBox($this);
        $this->message->label = $model->message->label;
        $this->message->validation=true;

        return parent::getContent();
    }

    public function onSubmit()
    {

        $this->contentType->contact = $this->contact->getValue();
        $this->contentType->email = $this->email->getValue();
        $this->contentType->message = $this->message->getValue();
        $this->contentType->saveType();

    }
}