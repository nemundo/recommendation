<?php

namespace Nemundo\App\UserAction\Form;


use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Login\UserLogin;
use Nemundo\User\Type\UserItemType;

class UserActivationForm extends AbstractAdminForm
{


    /**
     * @var BootstrapPasswordTextBox
     */
    private $password;

    public function getContent()
    {

        // $secureToken = (new SecureTokenUrlParameter())->getValue();

        //$user = (new UserItemType())->fromSecureTokenParameter();

        $bold = new Bold($this);
        $bold->content = (new UserBuilder())->fromSecureTokenParameter()->getUserRow()->login;  //  $user->login;


        $this->password = new BootstrapPasswordTextBox($this);
        $this->password->label[LanguageCode::EN] = 'What password do you want?';
        $this->password->label[LanguageCode::DE] = 'Gewünschtes Passwort';
        $this->password->validation = true;

        //$this->password->label = 'Gewünschtes Passwort';

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $password = $this->password->getValue();

        $user = (new UserBuilder())->fromSecureTokenParameter();  // (new UserItemType())->fromSecureTokenParameter();
        $user->changePassword($password);
        $user->enableUser();

        $login = new UserLogin();
        $login->login = $user->getUserRow()->login;
        $login->password = $password;
        $login->saveCookiePassword = true;
        $login->loginUser();

    }


}