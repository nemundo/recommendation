<?php

namespace Nemundo\App\UserAction\Form;


use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Login\UserLogin;
use Nemundo\User\Usergroup\AbstractUsergroup;


class UserRegistrationForm extends BootstrapForm
{

    /**
     * @var AbstractUsergroup[]
     */
    public $defaultUsergroupList;

    /**
     * @var BootstrapTextBox
     */
    private $email;

    /**
     * @var BootstrapPasswordTextBox
     */
    private $password;

    public function getContent()
    {

        $this->email = new BootstrapTextBox($this);
        $this->email->label = 'eMail';
        $this->email->validation = true;
        $this->email->validationType = ValidationType::IS_EMAIL;

        $this->password = new BootstrapPasswordTextBox($this);
        $this->password->label = 'Gewünschtes Passwort';
        $this->password->validation = true;


        return parent::getContent();
    }


    protected function onSubmit()
    {

        $email = $this->email->getValue();
        $password = $this->password->getValue();

        $builder = new UserBuilder();
        $builder->login = $email;
        $builder->email = $email;
        $builder->createUser();

        foreach ($this->defaultUsergroupList as $usergroup) {
            $builder->addUsergroup($usergroup);
        }


        $builder->changePassword($password);

        $login = new UserLogin();
        $login->login = $email;
        $login->password = $password;
        $login->loginUser();


    }


}