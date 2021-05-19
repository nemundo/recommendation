<?php

namespace Nemundo\Content\App\Contact\Content\Contact;

use Nemundo\Content\App\Contact\Data\Contact\ContactModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class ContactContentForm extends AbstractContentForm
{

    /**
     * @var ContactContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $company;

    /**
     * @var BootstrapTextBox
     */
    private $firstName;

    /**
     * @var BootstrapTextBox
     */
    private $lastName;

    /**
     * @var BootstrapTextBox
     */
    private $phone;

    /**
     * @var BootstrapTextBox
     */
    private $email;


    public function getContent()
    {

        $model = new ContactModel();

        $this->company = new BootstrapTextBox($this);
        $this->company->label = 'Company';

        $this->lastName = new BootstrapTextBox($this);
        $this->lastName->label = 'Last Name';

        $this->firstName = new BootstrapTextBox($this);
        $this->firstName->label = 'First Name';

        $this->phone = new BootstrapTextBox($this);
        $this->phone->label = 'Phone';

        $this->email = new BootstrapTextBox($this);
        $this->email->label = $model->email->label;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $contactRow = $this->contentType->getDataRow();

        $this->company->value = $contactRow->company;
        $this->lastName->value = $contactRow->lastName;
        $this->firstName->value = $contactRow->firstName;
        $this->phone->value = $contactRow->phone;
        $this->email->value = $contactRow->email;

    }


    public function onSubmit()
    {

        $this->contentType->company = $this->company->getValue();
        $this->contentType->lastName = $this->lastName->getValue();
        $this->contentType->firstName = $this->firstName->getValue();
        $this->contentType->phone = $this->phone->getValue();
        $this->contentType->email = $this->email->getValue();
        $this->contentType->saveType();

    }
}