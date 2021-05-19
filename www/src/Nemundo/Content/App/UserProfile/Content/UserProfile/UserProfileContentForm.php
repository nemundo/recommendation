<?php

namespace Nemundo\Content\App\UserProfile\Content\UserProfile;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UserProfileContentForm extends AbstractContentForm
{

    /**
     * @var UserProfileContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $lastName;

    /**
     * @var BootstrapTextBox
     */
    private $firstName;

    /**
     * @var BootstrapTextBox
     */
    private $email;

    public function getContent()
    {

        $this->lastName = new BootstrapTextBox($this);
        $this->lastName->label = 'Last Name';

        $this->firstName = new BootstrapTextBox($this);
        $this->firstName->label = 'First Name';

        $this->email = new BootstrapTextBox($this);
        $this->email->label = 'eMail';
        $this->email->validation = true;
        $this->email->validationType=ValidationType::IS_EMAIL;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        //$this->email->visible=false;

        $dataRow=$this->contentType->getDataRow();
        $this->lastName->value = $dataRow->lastName;
        $this->firstName->value = $dataRow->firstName;
        $this->email->value = $dataRow->user->email;

    }


    public function onSubmit()
    {

        $this->contentType->lastName = $this->lastName->getValue();
        $this->contentType->firstName = $this->firstName->getValue();
        $this->contentType->email = $this->email->getValue();
        $this->contentType->saveType();

    }
}