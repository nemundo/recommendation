<?php

namespace Nemundo\App\UserAdmin\Form;


use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox;
use Nemundo\User\Builder\UserBuilder;

class PasswordChangeForm extends AbstractAdminForm
{

    /**
     * @var string
     */
    public $userId;

    /**
     * @var BootstrapPasswordTextBox
     */
    private $password;

    public function getContent()
    {

        $this->password = new BootstrapPasswordTextBox($this);
        $this->password->label = 'Neues Passwort';
        $this->password->name = 'password';
        $this->password->validation = true;

        $this->submitButton->label = 'Passwort ändern';

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $builder = new UserBuilder($this->userId);
        $builder->changePassword($this->password->getValue());

    }

}